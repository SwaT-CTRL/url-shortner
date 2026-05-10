<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{
    protected $fillable = [
        'long_url',
        'short_code',
        'hits',
        'generator_type',
        'generator_id',
        'admin_id',
    ];

    public function generator()
    {
        return $this->morphTo();
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /** Full short URL (uses app URL + short code) */
    public function getShortUrlAttribute(): string
    {
        return url('/s/' . $this->short_code);
    }
}
