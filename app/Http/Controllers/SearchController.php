<?php

namespace App\Http\Controllers;

use App\Http\Services\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(Search $search)
    {
        $this->search = $search;
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $cases = $this->search->casesSearch($searchTerm);
        $consultations = $this->search->consultationsSearch($searchTerm);
        $visitors = $this->search->visitorsSearch($searchTerm);
        $users = $this->search->usersSearch($searchTerm);

        return view('search.searchResult', compact(
            'consultations',
            'visitors',
            'cases',
            'users'
        ));
    }

}
