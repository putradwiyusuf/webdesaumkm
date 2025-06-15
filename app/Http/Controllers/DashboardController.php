<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->level === 'superadmin') {
            return view('dashboard.superadmin', compact('user'));
        }

        if ($user->level === 'admin') {
            return view('dashboard.admin', compact('user'));
        }

        if ($user->level === 'user') {
            return view('dashboard.user', compact('user'));
        }

        // fallback jika level tidak dikenali
        abort(403, 'Akses tidak diizinkan.');
    }
}
