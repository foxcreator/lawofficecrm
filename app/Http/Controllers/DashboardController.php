<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\CourtCase;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $consultationsThisMonth = Consultation::count();
        $casesTotal = CourtCase::count();
        $newVisitorsThisMonth = Visitor::where('visitor_status', '1')->count();

        if (Auth::user()->hasRole(User::ROLE_ADMIN)) {
            $casesCount = CourtCase::all()->count();
            $consultations = Consultation::where('consultation_date', Carbon::today())->orderBy('consultation_date', 'desc')->get();
            $consultationsCount = Consultation::all()->count();

            return view('dashboards.admin', compact(
                'consultationsThisMonth',
                'casesTotal',
                'newVisitorsThisMonth',
                'consultations',
                'casesCount',
                'consultationsCount',
            ));
        } elseif(Auth::user()->hasRole(User::ROLE_MANAGER)) {
            $consultations = Consultation::orderBy('id', 'desc')->take(10)->get();

            return view('dashboards.manager', compact(
                'consultations',
                'consultationsThisMonth',
                'newVisitorsThisMonth',
                'casesTotal'
            ));
        } elseif(Auth::user()->hasRole(User::ROLE_ADVOCATE)) {
            $cases = CourtCase::where('user_id', auth()->id())->paginate(20);
            return view('dashboards.advocate', compact(
                'cases',
                'casesTotal',
                'consultationsThisMonth',
                'newVisitorsThisMonth'
            ));

        } elseif(Auth::user()->hasRole(User::ROLE_GUEST)) {
            return view('dashboards.guest');
        }
    }
}
