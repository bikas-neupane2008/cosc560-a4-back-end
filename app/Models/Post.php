<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = ['title', 'content', 'user_id'];

    /**
     * Automatically set the user_id to the authenticated user when creating a post.
     */
    protected static function booted()
    {
        static::creating(function (Post $post) {
            // Only set the user_id if it's not already set
            if (auth()->check() && is_null($post->user_id)) {
                $post->user_id = Auth::id();
            }
        });
    }

    /**
     * Define the relationship between Post and User.
     * A Post belongs to a User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Corrected foreign key and primary key reference
    }
}
