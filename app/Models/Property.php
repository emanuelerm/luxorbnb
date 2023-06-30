<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'rooms',
        'beds',
        'bathrooms',
        'square_meters',
        'address',
        'latitude',
        'longitude',
        'visible'
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }
}
