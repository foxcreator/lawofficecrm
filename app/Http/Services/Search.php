<?php

namespace App\Http\Services;

use App\Models\Consultation;
use App\Models\CourtCase;
use App\Models\User;
use App\Models\Visitor;

class Search
{
    public function casesSearch($searchTerm)
    {
        $cases = CourtCase::where('case_number', 'like', "%$searchTerm%")
            ->orWhere('case_production_number', 'like', "%$searchTerm%")
            ->orWhere('comment', 'like', "%$searchTerm%")
            ->orWhereHas('visitor', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%")
                    ->orWhere('surname', 'like', "%$searchTerm%");
            })->orWhereHas('user', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%")
                    ->orWhere('surname', 'like', "%$searchTerm%");
            })->orWhereHas('article', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })->orWhereHas('category', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })->paginate(10);

        return $cases;
    }

    public function consultationsSearch($searchTerm)
    {
        $consultations = Consultation::where('consultation_date', 'like', "%$searchTerm%")
            ->orWhere('comment', 'like', "%$searchTerm%")
            ->orWhereHas('visitor', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%")
                    ->orWhere('surname', 'like', "%$searchTerm%");
            })->orWhereHas('user', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%")
                    ->orWhere('surname', 'like', "%$searchTerm%");
            })->orWhereHas('reception', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })->orWhereHas('category', function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%$searchTerm%");
            })->paginate(10);

        return $consultations;
    }

    public function visitorsSearch($searchTerm)
    {
        $searchTerms = explode(' ', $searchTerm);

        $visitors = Visitor::where(function ($query) use ($searchTerms) {
            foreach ($searchTerms as $searchTerm) {
                $query->where('email', 'like', "%$searchTerm%")
                    ->orWhere('name', 'like', "%$searchTerm%")
                    ->orWhere('surname', 'like', "%$searchTerm%")
                    ->orWhere('tin_code', 'like', "%$searchTerm%")
                    ->orWhere('phone', 'like', "%$searchTerm%");
            }
        })->paginate(10);

        return $visitors;
    }

    public function usersSearch($searchTerm)
    {
        $searchTerms = explode(' ', $searchTerm);

        $users = User::where(function ($query) use ($searchTerms) {
            foreach ($searchTerms as $term) {
                $query->where('name', 'like', "%$term%")
                    ->orWhere('surname', 'like', "%$term%")
                    ->orWhere('email', 'like', "%$term%")
                    ->orWhere('phone', 'like', "%$term%");
            }
        })->paginate(10);

        return $users;
    }

}
