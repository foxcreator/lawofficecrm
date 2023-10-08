<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCaseRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\CourtCase;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;

class CasesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cases.index');
    }

    public function indexStatus($caseStatus)
    {
        if ($caseStatus == 0) {
            $cases = CourtCase::where('case_status', 0)->paginate(20);
        } else {
            $cases = CourtCase::query()->whereNot('case_status', 0)->paginate(20);
        }
        return view('cases.index', compact('cases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visitors = Visitor::where('visitor_status', '1')->get();
        $users = User::where('role', User::ROLE_ADVOCATE)->get();
        $articles = Article::all();
        $categories = Category::all();

        return view('cases.create', compact(
            'visitors',
            'categories',
            'users',
            'articles',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCaseRequest $request)
    {
        CourtCase::create($request->validated());
        return redirect()->back()->with('status', 'Справу успішно відкрито!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $case = CourtCase::where('id', $id)->first();
        return view('cases.card', compact('case'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $case = CourtCase::where('id', $id)->first();
        $visitors = Visitor::where('visitor_status', '1')->get();
        $users = User::where('role', User::ROLE_ADVOCATE)->get();
        $articles = Article::all();
        $categories = Category::all();

        return view('cases.edit', compact(
            'visitors',
            'categories',
            'users',
            'articles',
            'case'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // ToDo Make Validation!!
        $data = $request->all();
        unset($data['_token']);
        unset($data['_method']);
        $case = CourtCase::where('id', $id)->first();
        $success = $case->update($data);
        if ($success) {
            return redirect()->back()->with('status', "Справу №{$case->case_number} успішно оновлено");
        }

        // ToDo make the save new comment (maybe close case add to destroy method)
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
