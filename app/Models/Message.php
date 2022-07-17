<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = ['email', 'content', 'listing_id', 'user_id'];

    // Message belongs to one listing
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }

    // Message belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
