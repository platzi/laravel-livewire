<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Thread;

use Livewire\Component;

class ShowThreads extends Component
{
    public function render()
    {
        $categories = Category::get();
        $threads = Thread::latest()->get();

        return view('livewire.show-threads', [
            'categories' => $categories,
            'threads' => $threads,
        ]);
    }
}
