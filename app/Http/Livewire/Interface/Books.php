<?php

namespace App\Http\Livewire\Interface;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;


class Books extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.interface.books',  [
            'books' => Book::where('book_name', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(50)
        ]);
    }
}
