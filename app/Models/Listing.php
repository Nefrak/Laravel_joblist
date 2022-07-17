<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'user_id', 'logo', 'company', 'location', 'website', 'email', 'description', 'tags'];

    // Used in filter metod (in ListingController index)
    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false)
        {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }

        if($filters['search'] ?? false)
        {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    // Belong to one users
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Listing can have manny messages
    public function messages()
    {
        return $this->hasMany(Message::class, 'listing_id');
    }
}
