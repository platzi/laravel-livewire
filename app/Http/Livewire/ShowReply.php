<?php

namespace App\Http\Livewire;

use App\Models\Reply;

use Livewire\Component;

class ShowReply extends Component
{
    public Reply $reply;
    public $body = '';
    public $is_creating = false;
    public $is_editing = false;

    protected $listeners = ['refresh' => '$refresh'];

    public function updatedIsCreating()
    {
        $this->is_editing = false;
        
        $this->body = '';
    }

    public function updatedIsEditing()
    {
        // dd($is_editing);
        $this->is_creating = false;

        $this->body = $this->reply->body;
    }

    public function updateReply()
    {        
        // validate
        $this->validate(['body' => 'required']);

        // update
        $this->reply->update(['body' => $this->body]);

        // refresh
        $this->is_editing = false;
    }

    public function postChild()
    {
        if ( ! is_null($this->reply->reply_id)) return;
        
        // validate
        $this->validate(['body' => 'required']);

        // create
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body
        ]);

        // refresh
        $this->is_creating = false;
        $this->body = '';
        $this->emitSelf('refresh');
    }

    public function render()
    {
        return view('livewire.show-reply');
    }
}
