<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class ShowThreads extends Component
{
    public function render()
    {
        $categories = Category::get();

        return view('livewire.show-threads', [
            'categories' => $categories
        ]);
    }
}
