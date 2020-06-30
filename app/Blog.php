<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = [];

    public function tag() {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id')->withTimestamps();
    }
}
