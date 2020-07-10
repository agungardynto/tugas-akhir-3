<?php

namespace App\Http\Controllers;

use App\Room;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Requests\Room as RoomRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.room.index', [
            'title' => 'Room',
            'room' => Room::all()->sortByDesc('id'),
            'service' => Service::all()->sortByDesc('id')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.room.create', [
            'title' => 'CreateRoom',
            'service' => Service::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $grt = $request['thumbnail'];
        $grt = $request->file('thumbnail')->store('assets/room', 'public');
        $room = Room::create([
            'title' => $request['title'],
            'size' => $request['size'],
            'capacity' => $request['capacity'],
            'budget' => $request['budget'],
            'description' => $request['description'],
            'slug' => time().date('s-').Str::of($request['title'])->slug('-'),
            'thumbnail' => $grt
        ]);
        $room->service()->attach($request->service);
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('admin.pages.room.edit', [
            'title' => 'UpdateRoom',
            'data' => $room,
            'service' => Service::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, Room $room)
    {
        $grt = $request['thumbnail'];
        if ($grt) {
            Storage::delete('public/'. $room->thumbnail);
            $grt = $request->file('thumbnail')->store('assets/room', 'public');
            $room->update([
                'title' => $request['title'],
                'size' => $request['size'],
                'capacity' => $request['capacity'],
                'budget' => $request['budget'],
                'description' => $request['description'],
                'slug' => time().date('s-').Str::of($request['title'])->slug('-'),
                'thumbnail' => $grt
            ]);
        } else {
            $room->update([
                'title' => $request['title'],
                'size' => $request['size'],
                'capacity' => $request['capacity'],
                'budget' => $request['budget'],
                'description' => $request['description'],
                'slug' => time().date('s-').Str::of($request['title'])->slug('-')
            ]);
        }
        $room->service()->sync($request->service);
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        return abort(404);
    }
}
