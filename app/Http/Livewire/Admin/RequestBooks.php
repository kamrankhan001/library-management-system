<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\RequestBook;
use App\Models\Book;
use App\Models\ReturningBook;
use Carbon\Carbon;


class RequestBooks extends Component
{
    public function render()
    {
        $requests = DB::table('request_books')
        ->join('books', 'request_books.book_id', '=', 'books.id')
        ->join('users', 'request_books.user_id', '=', 'users.id')
        ->where('status', 'pending')
        ->get();
        
        return view('livewire.admin.request-books', compact('requests'));
    }

    public function accept($user_id, $book_id){
        $request = RequestBook::where('user_id', $user_id)
        ->where('book_id', $book_id)
        ->first();

        $request->status = "Approved";
        $request->save();

        if($this->borrowed($book_id)){
            $this->returning_date($user_id, $book_id);
            session()->flash('success', 'Book request accepted 😄');
        }else{
            session()->flash('error', 'Something went wrong 😞');
        }

    }

    public function cancel($user_id, $book_id){
        $request = RequestBook::where('user_id', $user_id)
        ->where('book_id', $book_id)
        ->first();

        $request->status = "Disapproved";
        $request->save();

        session()->flash('success', 'Book request canceled 😄');

    }

    protected function borrowed($book_id){
        $book = Book::find($book_id);
        if($book != null){
            $book->is_borrow = true;
            $book->save();
            return true;
        }else{
            return false;
        }
    }

    protected function returning_date($user_id, $book_id){
        ReturningBook::create([
            'user_id' => $user_id,
            'book_id' => $book_id,
            'issue_date' => Carbon::now()->toDateString(),
            'returning_date' => Carbon::now()->addDay(7),
        ]);
    }
}
