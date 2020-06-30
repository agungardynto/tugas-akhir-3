<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function home() {
        return view('static.pages.home');
    }

    public function rooms() {
        return view('static.pages.rooms');
    }

    public function contact() {
        return view('static.pages.contact');
    }
}
