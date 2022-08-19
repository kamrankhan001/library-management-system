<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Book;

class Books extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $book_id, $book_name, $category, $cover;

    public function render()
    {
        return view('livewire.admin.books',  [
            'books' => Book::orderBy('id', 'desc')->paginate(5)
        ]);
    }

    public function empty_values(){
        $this->reset('book_id', 'book_name', 'category', 'cover');
    }

    public function add_book(){
        $this->validate([
            'book_name' => 'required|max:200',
            'category' => 'required|max:200',
            'cover' => 'required|mimes:jpg,png,jpeg',
        ]);

        $image = $this->cover->store('public/books-images');
        $image = explode('/',$image);
        array_shift($image);
        $image = implode('/',$image);

        Book::create([
            'book_name' => $this->book_name,
            'category' => $this->category,
            'cover_image' => $image,
        ]);

        $this->reset('book_name', 'category', 'cover');

        session()->flash('success', 'Book add successfully 😄');

        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit($id){
        $book = Book::find($id);
        $this->book_name = $book->book_name;
        $this->category = $book->category;
        $this->book_id = $book->id;
    }

    public function update_book(){
        $book = Book::find($this->book_id);
        if($this->cover != null){
            $this->validate([
                'cover' => 'required|mimes:jpg,png,jpeg',
            ]);
    
            $old_image = $book->cover_image;

            $image = $this->cover->store('public/books-images');
            $image = explode('/',$image);
            array_shift($image);
            $image = implode('/',$image);

            $book->cover_image = $image;

            unlink('storage/'.$old_image);

        }else{
            $this->validate([
                'book_name' => 'required|max:200',
                'category' => 'required|max:200',
            ]);
    
            $book->book_name = $this->book_name;
            $book->category = $this->category;
        }

        $book->save();

        $this->reset('book_name', 'category', 'cover');

        session()->flash('success', 'Book updated successfully 😄');

        $this->dispatchBrowserEvent('close-modal');

    }

    public function book_delete(){
        Book::where('id', $this->book_id)->delete();
        $this->reset('book_id', 'category', 'book_name');
        $this->dispatchBrowserEvent('close-modal');
        session()->flash('success', 'Book delete successfully 😄');
    }
}
