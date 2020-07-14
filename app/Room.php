<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function service() {
        return $this->belongsToMany(Service::class, 'room_service', 'room_id', 'service_id')->withTimestamps();
    }

    public function booking() {
        return $this->hasMany(Booking::class, 'room_id', 'id');
    }

    public function user() {
        return $this->belongsToMany(User::class, 'like', 'room_id', 'user_id')->withTimestamps();
    }
}
