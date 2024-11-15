<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['comment_id', 'body', 'author']; // Allow mass assignment for these fields


    public function comment()
{
    return $this->belongsTo(Comment::class);
}
}
