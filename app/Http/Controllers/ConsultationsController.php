<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConsultationRequest;
use App\Models\Category;
use App\Models\Consultation;
use App\Models\Reception;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class ConsultationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::orderBy('id', 'desc')->take(20)->paginate(10);
        $visitors = Visitor::all();
        $users = User::query()->where('role', User::ROLE_ADVOCATE)->get();
        $categories = Category::all();
        $receptions = Reception::all();
        return view('consultation.index',
            compact(
                'consultations',
                'visitors',
                'users',
                'categories',
                'receptions',
            ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visitors = Visitor::all();
        $users = User::query()->where('role', User::ROLE_ADVOCATE)->get();
        $categories = Category::all();
        $receptions = Reception::all();
        return view('consultation.create',
            compact(
                'visitors',
                'users',
                'categories',
                'receptions',
            ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateConsultationRequest $request)
    {
        $consultation = Consultation::create($request->validated());

        if ($consultation) {
            return redirect()->back()->with('status', 'Запис про нову консультацію створено');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
