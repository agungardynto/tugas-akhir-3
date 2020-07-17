<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use App\Blog;

class AdminController extends Controller
{
    public function dashboard() {
        return view('admin.pages.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
