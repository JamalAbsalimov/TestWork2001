<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthorController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index():View
    {
        return view('authors.index');
    }
}
