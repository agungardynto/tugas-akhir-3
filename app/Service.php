<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['service'];

    public function room() {
        return $this->belongsToMany('room_service', 'service_id', 'room_id')->withTimestamps();
    }
}
