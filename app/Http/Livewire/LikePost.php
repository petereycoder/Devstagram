<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $isliked;

    public function mount($post)
    {
        $this->isliked = $post->checkLike(auth()->user());
    }

    public function like(){
        if( $this->post->checkLike(auth()->user() ))
        {
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isliked = false;
        }else{
            $this->post->likes()->create([
                'user_id' => auth()->user()->id
            ]);
            $this->isliked = true;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
