<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('posts.index');
    }

    public function create(): View
    {
        return view('posts.edit-add');
    }
}
