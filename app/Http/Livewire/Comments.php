<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class Comments extends Component
{
    use WithPagination;

    public $newComment;
    public $comments;
    public $comment;
    public $post;

    public function addComment()
    {
        $posted = auth()->user()->comments()->create([
            'comment'=>$this->comment, 
            'post_id' => $this->post->id,
            'parent_id'=> 0,
        ]);
        
        $this->emit('posted',$posted->id);
        session()->flash('message', 'Comment successfully posted.');
        session()->flash('time', Carbon::now());
    
    }

    public function render()
    {
        $allComments = Comment::where('post_id',$this->post->id)->orderBy('id','DESC')->paginate(10);
        return view('livewire.comments',['allComments'=>$allComments]);
    }
}
