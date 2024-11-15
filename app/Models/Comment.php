<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'body', 'author']; // Allow mass assignment for these fields


    public function post()
{
    return $this->belongsTo(Post::class);
}

public function replies()
{
    return $this->hasMany(Reply::class);
}
}
