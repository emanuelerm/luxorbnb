<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'images',
        'title',
        'description',
        'rooms',
        'beds',
        'bathrooms',
        'square_meters',
        'address',
        'latitude',
        'longitude',
        'visible',
        'slug',
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

        return $this->hasMany(Message::class)->where('user_id', auth()->id());
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'property_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'property_service');
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

}
