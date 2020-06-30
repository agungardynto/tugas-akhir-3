<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['tag'];

    public function blog() {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'tag_id', 'blog_id')->withTimestamps();
    }
}
