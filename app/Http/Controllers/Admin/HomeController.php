<?php

namespace Board\Http\Controllers\Admin;

use Board\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
}