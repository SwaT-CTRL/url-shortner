<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $guard = 'member';

    protected $fillable = ['name', 'email', 'password', 'role', 'admin_id'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return ['password' => 'hashed'];
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function shortUrls()
    {
        return $this->morphMany(ShortUrl::class, 'generator');
    }
}
