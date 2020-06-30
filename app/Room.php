<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = [];

    public function service() {
        return $this->belongsToMany('room_service', 'room_id', 'service_id')->withTimestamps();
    }
}
