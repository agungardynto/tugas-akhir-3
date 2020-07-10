<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function room() {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
