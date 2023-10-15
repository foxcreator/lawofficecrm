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
// ToDo Make Sorting data in all tables

    public function contractAction(Request $request, $client)
    {
        $client = Visitor::find($client);
        $birthdate = Carbon::create($client->birthdate);
        // Генерация PDF на основе шаблона и данных


// Рендеринг PDF (с нумерацией страниц)
//        $dompdf->render();
        $pdf = PDF::loadView('docs.contract', compact('client', 'birthdate'));
//        PDF::l
        // Скачивание PDF
//        return $pdf->download('contract.pdf');
        return $pdf->stream('contract.pdf');

    }

    public function testing()
    {
        $now = Carbon::now();
        dd($now->translatedFormat('d F Y'));
    }
}
