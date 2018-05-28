<?php

namespace Board\Http\Controllers\Cabinet;

use Board\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('cabinet.home');
    }
}
