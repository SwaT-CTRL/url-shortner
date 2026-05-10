<?php

namespace App\Http\Controllers\Member;

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
        return view('member.pages.generate_url');
    }

    public function store(Request $request)
    {
        $request->validate([
            'long_url' => 'required|url',
        ]);

        $member = Auth::guard('member')->user();

        ShortUrl::create([
            'long_url'       => $request->long_url,
            'short_code'     => Str::random(6),
            'generator_type' => get_class($member),
            'generator_id'   => $member->id,
            'admin_id'       => $member->admin_id,
            'hits'           => 1,
        ]);

        return redirect()->route('member.urls.index')->with('success', 'Short URL generated successfully.');
    }

    public function index(Request $request)
    {
        $member = Auth::guard('member')->user();
        $query = ShortUrl::where('generator_type', get_class($member))
                        ->where('generator_id', $member->id);

        $query = $this->applyFilter($query, $request->filter);
        
        $urls = $query->latest()->paginate(2);
        return view('member.pages.generate_url_data', compact('urls'));
    }


    public function downloadPdf(Request $request)
    {
        $member = Auth::guard('member')->user();
        $query = ShortUrl::where('generator_type', get_class($member))
                        ->where('generator_id', $member->id);

        $query = $this->applyFilter($query, $request->filter);
        
        $urls = $query->latest()->get();
        
        $pdf = Pdf::loadView('pdf.urls', compact('urls'));
        return $pdf->download('my_urls.pdf');
    }
}

