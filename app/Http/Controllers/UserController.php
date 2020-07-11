<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;


class UserController extends Controller
{
    public function dashboard() {
        $booking = DB::table('booking')->where([
            ['user_id', Auth::user()->id],
            ['status', '>=', 1]
        ])->orderBy('id', 'desc')->get();
        $expired = DB::table('booking')->where([
            ['user_id', Auth::user()->id],
            ['status', 0]
        ])->orderBy('id', 'desc')->get();
        return view('user.pages.dashboard', [
            'title' => 'Dashboard',
            'booking' => $booking,
            'expired' => $expired
        ]);
    }

    public function profile() {
        return view('user.pages.profile', [
            'title' => 'User Profile'
        ]);
    }

    public function update_profile(Request $request) {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:1',
            'address' => '',
            'phone_number' => 'required|numeric|digits_between:12,15',
            'foto' => 'file|image|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);
        if (!empty($validator['foto'])) {
            if (Auth::user()->foto == 'user_default.png' || Auth::user()->foto == 'admin_default.png') {
                $validator['foto'] = $request->file('foto')->store('assets/profile', 'public');
            } else {
                Storage::delete('public/', Auth::user()->foto);
                $validator['foto'] = $request->file('foto')->store('assets/profile', 'public');
            }
        }
        Auth::user()->update($validator);
        return redirect()->route('dashboard_user');
    }
}
