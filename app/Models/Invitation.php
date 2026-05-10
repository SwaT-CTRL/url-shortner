<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'role',
        'inviter_type',
        'inviter_id',
    ];

    public function inviter()
    {
        return $this->morphTo();
    }
}
