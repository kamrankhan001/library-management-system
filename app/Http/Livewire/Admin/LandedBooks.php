<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class LandedBooks extends Component
{
    public function render()
    {
        $lands = DB::table('returning_books')
        ->join('books', 'returning_books.book_id', '=', 'books.id')
        ->join('users', 'returning_books.user_id', '=', 'users.id')
        ->where('status', 'borrowed')
        ->get();

        return view('livewire.admin.landed-books', compact('lands'));
    }
}
