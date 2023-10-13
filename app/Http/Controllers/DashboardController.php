<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\CourtCase;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $consultationsThisMonth = Consultation::whereMonth('created_at', now()->month)->count();
        $wonCasesTotal = CourtCase::where('case_status', 1)->count();
        $newVisitorsThisMonth = Visitor::whereMonth('created_at', now()->month)->count();

        if (Auth::user()->hasRole(User::ROLE_ADMIN)) {
            $cases = CourtCase::where('case_status', 0)->orderBy('id', 'desc')->take(8)->get();
            $casesCount = CourtCase::where('case_status', 0)->count();
            $consultations = Consultation::orderBy('id', 'desc')->take(8)->get();
            $consultationsCount = Consultation::all()->count();

            return view('dashboards.admin', compact(
                'consultationsThisMonth',
                'wonCasesTotal',
                'newVisitorsThisMonth',
                'cases',
                'consultations',
                'casesCount',
                'consultationsCount',
            ));
        } elseif(Auth::user()->hasRole(User::ROLE_MANAGER)) {
            $consultations = Consultation::orderBy('id', 'desc')->take(10)->get();

            return view('dashboards.manager', compact(
                'consultations',
                'consultationsThisMonth',
                'newVisitorsThisMonth'
            ));
        } elseif(Auth::user()->hasRole(User::ROLE_ADVOCATE)) {
            $cases = CourtCase::where('case_status', 0)->where('id', auth()->id())->paginate(20);
            return view('dashboards.advocate', compact('cases'));

        } elseif(Auth::user()->hasRole(User::ROLE_GUEST)) {
            return view('dashboards.guest');
        }
    }
}
