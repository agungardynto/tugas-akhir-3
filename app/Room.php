<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function service() {
        return $this->belongsToMany(Service::class, 'room_service', 'room_id', 'service_id')->withTimestamps();
    }

    public function user() {
        return $this->belongsToMany(User::class, 'booking', 'user_id', 'room_id');
    }
}
