<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'offer_property');
    }
}
