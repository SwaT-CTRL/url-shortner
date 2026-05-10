<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use App\Traits\UrlFilterTrait;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class UrlController extends Controller
{
    use UrlFilterTrait;

    public function index(Request $request)
    {
        $query = ShortUrl::with('generator');
        $query = $this->applyFilter($query, $request->filter);
        
        $urls = $query->latest()->paginate(2);
        return view('superadmin.pages.url_index', compact('urls'));
    }


    public function downloadPdf(Request $request)
    {
        $query = ShortUrl::with('generator');
        $query = $this->applyFilter($query, $request->filter);
        
        $urls = $query->latest()->get();
        
        $pdf = Pdf::loadView('pdf.urls', compact('urls'));
        return $pdf->download('all_urls.pdf');
    }
}
