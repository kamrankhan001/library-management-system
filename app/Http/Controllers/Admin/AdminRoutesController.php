<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\RequestBook;

class AdminRoutesController extends Controller
{
    public function dashboard(){
        $students = User::where('is_admin', false)->count();
        $books = Book::count();
        $today_request = RequestBook::where('request_date', date('Y/m/d'))->count();

        return view('admin.dashboard', compact('students', 'books','today_request'));
    }

    public function books(){
        return view('admin.books');
    }
    
    public function students(){
        return view('admin.students');
    }

    public function landed_books(){
        return view('admin.landed-books');
    }

    public function request_books(){
        return view('admin.request-books');
    }
}
