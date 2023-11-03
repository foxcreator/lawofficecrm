<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\CourtCase;
use App\Models\User;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
// ToDo Make Sorting data in all tables`

    public function contractAction(Request $request, $case)
    {
        $case = CourtCase::find($case);
        $birthdate = Carbon::create($case->visitor->birthdate);
        $passportWhenIssued = Carbon::create($case->visitor->passport_when_issued);
        // Генерация PDF на основе шаблона и данных
        $pdf = PDF::loadView('docs.contract', compact('case', 'birthdate', 'passportWhenIssued'));
        // Скачивание PDF
//        return $pdf->download('contract.pdf');
        return $pdf->stream('contract.pdf');

    }
}
