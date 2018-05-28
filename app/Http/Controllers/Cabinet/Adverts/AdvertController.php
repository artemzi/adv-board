<?php

namespace Board\Http\Controllers\Cabinet\Adverts;

use Board\Http\Controllers\Controller;
use Board\Http\Middleware\FilledProfile;

class AdvertController extends Controller
{
    public function __construct()
    {
        $this->middleware(FilledProfile::class);
    }

    public function index()
    {
        return view('cabinet.adverts.index');
    }
}