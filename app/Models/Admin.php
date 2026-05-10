<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = ['name', 'email', 'password', 'superadmin_id', 'invited_by_admin_id'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return ['password' => 'hashed'];
    }

    public function superadmin()
    {
        return $this->belongsTo(Superadmin::class);
    }

    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function shortUrls()
    {
        return $this->hasMany(ShortUrl::class);
    }

    public function allShortUrls()
    {
        return ShortUrl::where('admin_id', $this->id);
    }
}
