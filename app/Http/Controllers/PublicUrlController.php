<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class PublicUrlController extends Controller
{
    public function redirect($code)
    {
        $shortUrl = ShortUrl::where('short_code', $code)->firstOrFail();

        // Increment hits manually to ensure save
        $shortUrl->hits = $shortUrl->hits + 1;
        $shortUrl->save();

        return redirect()->away($shortUrl->long_url, 302, [
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0',
        ]);
    }
}
