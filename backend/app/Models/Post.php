<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'likes',
        'is_approved',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tags that are associated with the post.
     */
    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
