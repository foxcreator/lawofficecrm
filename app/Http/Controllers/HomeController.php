<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Visitor;
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
        // ToDo Make a search from cases and view design maybe with tabs
        $query = $request->input('search');
        $visitorColumnsToSearch = [
            'email',
            'name',
            'surname',
            'father_name',
            'birthdate',
            'tin_code',
            'passport_number',
            'address',
            'phone',
            'phone',
        ];

        $consultationsColumnsToSearch = [
            'consultation_date',
            'comment',
            'user_id',
            'category_id',
            'visitor_id',
            'reception_id',
        ];

        $visitors = Visitor::where(function($queryBuilder) use ($visitorColumnsToSearch, $query) {
            foreach ($visitorColumnsToSearch as $column) {
                $queryBuilder->orWhere($column, 'like', "%$query%");
            }
        })->get();

        $consultations = Consultation::where(function($queryBuilder) use ($consultationsColumnsToSearch, $query) {
            foreach ($consultationsColumnsToSearch as $column) {
                $queryBuilder->orWhere($column, 'like', "%$query%");
            }
        })->get();

//        $results = Visitor::where(function($query) use ($visitorColumnsToSearch, $searchTerm) {
//            foreach ($visitorColumnsToSearch as $column) {
//                $query->orWhere($column, 'like', "%$searchTerm%");
//            }
//        })->orWhereHas('consultations', function($query) use ($consultationsColumnsToSearch, $searchTerm) {
//            $query->where(function($queryBuilder) use ($consultationsColumnsToSearch, $searchTerm) {
//                foreach ($consultationsColumnsToSearch as $column) {
//                    $queryBuilder->orWhere($column, 'like', "%$searchTerm");
//                }
//            });
//        })->get();





        return view('search.searchResult', compact('consultations', 'visitors'));
    }
}
