<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function favourites()
    {
        return $this->hasMany(Favourites::class, 'product_id');
    }

    public function Region()
    {
        return $this->belongsTo(Region::class, 'region');
    }

    public function Views()
    {
        return $this->hasMany(Views::class);
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'city');
    }

    public function Call()
    {
        return $this->hasMany(Views::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

}
