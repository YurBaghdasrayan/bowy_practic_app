<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    const ADMIN_ID = 2;
    const USER_ID = 1;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
