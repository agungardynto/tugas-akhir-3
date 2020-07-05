<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function home() {
        return view('static.pages.home', [
            'room' => Room::orderBy('id', 'desc')->paginate(4)
        ]);
    }

    public function rooms() {
        return view('static.pages.rooms', [
            'room' => Room::orderBy('id', 'desc')->paginate(6)
        ]);
    }

    public function contact() {
        return view('static.pages.contact');
    }
}
