<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Students extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.students', [
            'students' => User::where('is_admin', false)->orderBy('id', 'desc')->paginate(5)
        ]);
    }
}
