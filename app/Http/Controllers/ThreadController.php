<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function edit(Thread $thread)
    {
        $categories = Category::get();

        return view('thread.edit', compact('categories', 'thread'));
    }
}
