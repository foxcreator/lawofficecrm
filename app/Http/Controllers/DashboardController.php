<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == User::ROLE_ADMIN) {
            return view('dashboards.admin');
        } elseif(Auth::user()->role == User::ROLE_MANAGER) {
            return view('dashboards.manager');
        } elseif(Auth::user()->role == User::ROLE_ADVOCATE) {
            return view('dashboards.advocate');
        } elseif(Auth::user()->role == User::ROLE_GUEST) {
            return view('dashboards.guest');
        }
    }
}
