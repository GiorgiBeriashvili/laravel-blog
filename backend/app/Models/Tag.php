<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /**
     * Get the posts that are associated with the tag.
     */
    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
