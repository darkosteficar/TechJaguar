<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public $newComment;
    public $comments;
    public $comment;
    public $post;

    public function addComment()
    {
        auth()->user()->comments()->create([
            'comment'=>$this->comment, 
            'post_id' => $this->post->id,
            'parent_id'=> 0,
        ]);
        session()->flash('message','Komentar uspješno postavljen!');
     
    
    }

    public function render()
    {
        $this->comments = Comment::where('post_id',$this->post->id)->orderBy('id','DESC')->get();
        return view('livewire.comments');
    }
}
