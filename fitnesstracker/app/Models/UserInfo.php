<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        $this->belongsTo(\App\Models\User::class);
    }
}
