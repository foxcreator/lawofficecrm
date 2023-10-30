<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\CourtCase;
use App\Models\User;
use App\Models\Visitor;
use Barryvdh\DomPDF\Facade\Pdf;
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
    public function search(Request $request)
    {
        // ToDo Make a search from cases and view design maybe with top-tabs
        $searchTerm = $request->input('search');
        $searchTerms = explode(' ', $searchTerm);


//        $cases = CourtCase::where('case_number', 'like', "%$searchTerm%")
//        ->orWhere('case_production_number', 'like', "%$searchTerm%")
//        ->orWhere('comment', 'like', "%$searchTerm%")
//        ->orWhereHas('visitor', function ($query) use ($searchTerm) {
//            $query->where('name', 'like', "%$searchTerm%");
//        })->orWhereHas('user', function ($query) use ($searchTerm) {
//            $query->where('name', 'like', "%$searchTerm%");
//        })->orWhereHas('article', function ($query) use ($searchTerm) {
//            $query->where('name', 'like', "%$searchTerm%");
//        })->orWhereHas('category', function ($query) use ($searchTerm) {
//            $query->where('name', 'like', "%$searchTerm%");
//        })->paginate(10);

        $consultations = Consultation::where('consultation_date', 'like', "%$searchTerm%")
            ->orWhere('comment', 'like', "%$searchTerm%")
            ->orWhereHas('visitor', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })->orWhereHas('user', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })->orWhereHas('reception', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })->orWhereHas('category', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })->paginate(10);

        $visitors = Visitor::where(function ($query) use ($searchTerms) {
            foreach ($searchTerms as $searchTerm) {
                $query->where('email', 'like', "%$searchTerm%")
                    ->orWhere('name', 'like', "%$searchTerm%")
                    ->orWhere('surname', 'like', "%$searchTerm%")
                    ->orWhere('tin_code', 'like', "%$searchTerm%")
                    ->orWhere('phone', 'like', "%$searchTerm%");
            }
        })->paginate(10);



        $users = User::where(function ($query) use ($searchTerms) {
            foreach ($searchTerms as $term) {
                $query->where('name', 'like', "%$term%")
                    ->orWhere('surname', 'like', "%$term%")
                    ->orWhere('email', 'like', "%$term%")
                    ->orWhere('phone', 'like', "%$term%");
            }
        })->paginate(10);



//dd($cases);

        return view('search.searchResult', compact(
            'consultations',
            'visitors',
            'cases',
            'users'
        ));
    }

    public function contractAction(Request $request, $client)
    {
        $client = Visitor::find($client);

        // Генерация PDF на основе шаблона и данных
        $pdf = PDF::loadView('docs.contract', compact('client'));
        // Скачивание PDF
        return $pdf->download('contract.pdf');
//        return $pdf->stream('contract.pdf');

    }
}
