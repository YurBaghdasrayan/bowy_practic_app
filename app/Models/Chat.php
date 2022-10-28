<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = ('live_chat');

//    public function getCreatedAtAttribute($value)
//    {
//        $date = Carbon::parse($value);
//        return $date->format('Y-m-d');
//    }

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function forusers()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
