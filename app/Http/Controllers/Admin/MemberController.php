<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Member;
use App\Mail\MemberInviteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index()
    {
        $currentAdmin = Auth::guard('admin')->user();
        
        // Fetch only members from the members table (to avoid showing sub-admins twice if we store them in both)
        $users = Member::where('admin_id', $currentAdmin->id)->latest()->paginate(2);

        return view('admin.pages.members_index', compact('users'));
    }


    public function showInvite()
    {
        return view('admin.pages.invite');
    }

    public function sendInvite(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:members,email|unique:admins,email',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,member',
        ]);

        $admin = Auth::guard('admin')->user();

        // Always create in members table for tracking
        $user = Member::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'admin_id' => $admin->id,
        ]);

        // If it's an admin, also create in admins table for authentication at /admin/login
        if ($request->role === 'admin') {
            Admin::create([
                'name'                 => $request->name,
                'email'                => $request->email,
                'password'             => Hash::make($request->password),
                'invited_by_admin_id'  => $admin->id,
            ]);
        }

        // Log Invitation
        \App\Models\Invitation::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'role'         => $request->role,
            'inviter_type' => get_class($admin),
            'inviter_id'   => $admin->id,
        ]);

        // Send Email
        Mail::to($user->email)->send(new MemberInviteMail($user->name, $user->email, $request->password, $request->role, $admin->name));

        return redirect()->route('admin.members.index')->with('success', ucfirst($request->role) . ' invited successfully and email sent.');
    }
}


