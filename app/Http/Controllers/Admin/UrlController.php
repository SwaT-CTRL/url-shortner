<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ShortUrl;
use App\Traits\UrlFilterTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class UrlController extends Controller
{
    use UrlFilterTrait;

    public function showGenerate()
    {
        return view('admin.pages.generate_url');
    }

    public function store(Request $request)
    {
        $request->validate([
            'long_url' => 'required|url',
        ]);

        $admin = Auth::guard('admin')->user();

        ShortUrl::create([
            'long_url'       => $request->long_url,
            'short_code'     => Str::random(6),
            'generator_type' => get_class($admin),
            'generator_id'   => $admin->id,
            'admin_id'       => $admin->id,
            'hits'           => 1,
        ]);

        return redirect()->route('admin.urls.index')->with('success', 'Short URL generated successfully.');
    }

    public function index(Request $request)
    {
        $adminId = Auth::guard('admin')->id();
        $query = ShortUrl::where('admin_id', $adminId)->with('generator');
        
        $query = $this->applyFilter($query, $request->filter);
        
        $urls = $query->latest()->paginate(2);
        return view('admin.pages.generate_url_data', compact('urls'));
    }


    public function downloadPdf(Request $request)
    {
        $adminId = Auth::guard('admin')->id();
        $query = ShortUrl::where('admin_id', $adminId)->with('generator');
        
        $query = $this->applyFilter($query, $request->filter);
        
        $urls = $query->latest()->get();
        
        $pdf = Pdf::loadView('pdf.urls', compact('urls'));
        return $pdf->download('my_urls.pdf');
    }
}

