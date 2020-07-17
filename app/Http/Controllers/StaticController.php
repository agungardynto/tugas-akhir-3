<?php

namespace App\Http\Controllers;

use App\Room;
use App\Blog;
use App\Contact;
use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StaticController extends Controller
{
    public function __construct() {
        $this->contact = Contact::where('id', 1)->first();
    }
    
    public function home() {
        return view('static.pages.home', [
            'room' => Room::orderBy('id', 'desc')->paginate(4),
            'blog' => Blog::orderBy('id', 'desc')->take(5)->get(),
            'contact' => $this->contact,
            'faq' => Faq::all()
        ]);
    }

    public function rooms() {
        return view('static.pages.rooms', [
            'room' => Room::orderBy('id', 'desc')->paginate(6),
            'contact' => $this->contact
        ]);
    }

    public function blog() {
        return view('static.pages.blog', [
            'blog' => Blog::orderBy('id', 'desc')->paginate(6),
            'contact' => $this->contact
        ]);
    }

    public function contact() {
        return view('static.pages.contact', [
            'contact' => $this->contact
        ]);
    }

    public function droom($slug) {
        $room = Room::where('slug', $slug)->first();
        $chklike = null;
        if ($room !== null) {
            if (Auth::user()) {
                $chklike = DB::table('like')->where([
                    ['user_id', Auth::user()->id],
                    ['room_id', $room->id]
                ])->first();
            }
            return view('static.pages.room_detail', [
                'room' => $room,
                'contact' => $this->contact,
                'chklike' => $chklike
            ]);
        } else {
            return abort(404);
        }
    }

    public function dblog($slug) {
        $blog = Blog::where('slug', $slug)->first();
        if ($blog !== null) {
            $blog->update(['view' => $blog->view + 1]);
            return view('static.pages.blog_detail', [
                'blog' => $blog,
                'contact' => $this->contact
            ]);
        } else {
            return abort(404);
        }
    }

    public function booking(Request $request, $slug) {
        $gir = Room::where('slug', $slug)->first();
        $validator = $request->validate([
            'check_in' => 'required|date_format:Y-m-d',
            'check_out' => 'required|date_format:Y-m-d',
            'guest' => 'required|numeric|digits_between:1,2'
        ]);
        $status = null;
        if (strtotime($request->check_in) < time()) {
            $status = 0;
        } elseif (strtotime($request->check_in) > strtotime($request->check_out)) {
            $status = 0;
        } else {
            $status = 1;
        }
        DB::table('booking')->insert([
            'user_id' => Auth::user()->id,
            'room_id' => $gir->id,
            'check_in' => $validator['check_in'],
            'check_out' => $validator['check_out'],
            'guest' => $validator['guest'],
            'code' => rand(000001, 999999) + Auth::user()->id,
            'status' => $status,
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
        return redirect()->route('detail_room', $slug);
    }

    public function send_message(Request $request) {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        DB::table('feeds')->insert([
            'name' => $validator['name'],
            'email' => $validator['email'],
            'message' => $validator['message'],
            'created_at' => date(now()),
            'updated_at' => date(now())
        ]);
        return redirect()->route('contact');
    }

    public function likes(Request $request) {
        $chk = DB::table('like')->where([
            ['user_id', Auth::user()->id],
            ['room_id', $request->like]
        ]);
        if ($chk->first() !== null) {
            $chk->delete();
        } else {
            Auth::user()->room()->attach($request->like);
        }
    }
}
