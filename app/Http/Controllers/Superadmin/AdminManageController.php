<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ShortUrl;
use App\Models\Member;
use App\Mail\AdminInviteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class AdminManageController extends Controller
{
    public function index()
    {
        $admins = Admin::withCount(['members', 'shortUrls'])->latest()->paginate(2);

        // Calculate total hits for each admin panel
        foreach ($admins as $admin) {
            $admin->total_hits = ShortUrl::where('admin_id', $admin->id)->sum('hits');
        }

        return view('superadmin.pages.admin_index', compact('admins'));
    }

    public function membersIndex()
    {
        $members = Member::with('admin')->latest()->paginate(2);
        return view('superadmin.pages.member_index', compact('members'));
    }


    public function showInvite()
    {
        return view('superadmin.pages.invite');
    }

    public function sendInvite(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
        ]);

        $admin = Admin::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'superadmin_id'  => Auth::guard('superadmin')->id(),
        ]);

        // Log Invitation
        \App\Models\Invitation::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'role'         => 'admin',
            'inviter_type' => get_class(Auth::guard('superadmin')->user()),
            'inviter_id'   => Auth::guard('superadmin')->id(),
        ]);

        // Send Email
        Mail::to($admin->email)->send(new AdminInviteMail($admin->name, $admin->email, $request->password, Auth::guard('superadmin')->user()->name));

        return redirect()->route('superadmin.admins.index')->with('success', 'Admin invited successfully and email sent.');
    }
}
