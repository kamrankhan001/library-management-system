<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\RequestBook;
use Carbon\Carbon;

class InterfaceController extends Controller
{
    public function home(){
        return view('interface.home');
    }

    public function books(){
        return view('interface.books');
    }

    public function book_details($id){
        return view('interface.book-detail', [
            'book' => Book::find($id)
        ]);
    }

    public function book_request(Request $request){
        $request->validate([
            'days' => 'required'
        ]);

        RequestBook::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'days' => $request->days,
            'request_date' => Carbon::now()->toDateString(),
        ]);

        return redirect(route('profile'))->with('success', 'your request for book send successfully');
    }
}
