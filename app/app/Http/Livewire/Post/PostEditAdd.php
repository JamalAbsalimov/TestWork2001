<?php

namespace app\Http\Livewire\Post;

use Illuminate\View\View;
use Livewire\Component;

class PostEditAdd extends Component
{
    public function render(): View
    {
        return view('livewire.posts.form');
    }
}
