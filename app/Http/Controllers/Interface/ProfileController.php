<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RequestBook;

class ProfileController extends Controller
{
    public function profile(){
        $requests = DB::table('request_books')
        ->join('books', 'request_books.book_id', '=', 'books.id')
        ->join('users', 'request_books.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)->get();

        $issues = DB::table('returning_books')
        ->join('books', 'returning_books.book_id', '=', 'books.id')
        ->join('users', 'returning_books.user_id', '=', 'users.id')
        ->where('user_id', auth()->user()->id)
        ->where('status', 'borrowed')->get();

        return view('interface.profile.profile', compact('requests', 'issues'));
    }
}
