<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        return view('front.home');
    }
}
