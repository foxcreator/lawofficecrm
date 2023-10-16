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
    public function index()
    {
        return abort(404);
    }

    public function indexStatus(Request $request, $caseStatus)
    {

        $query = CourtCase::query();

        if ($request->has('sort_by')) {
            $sortBy = $request->input('sort_by');
            $sortOrder = $request->input('sort_order', 'asc');
            $query->orderBy($sortBy, $sortOrder);
        } else {
            $sortBy = 'case_number';
            $sortOrder = 'desc';
            $query->orderBy($sortBy, $sortOrder);
        }

        if (auth()->user()->hasRole(User::ROLE_ADVOCATE)) {
            $advocateId = auth()->id();
            if ($caseStatus == 0) {
                $query = $query->where('case_status', 0)->where('id', $advocateId);
            } else {
                $query = $query->where('id', $advocateId)->where('case_status', '!=', 0);
            }
        } else {
            if ($caseStatus == 0) {
                $query->where('case_status', 0);
            } else {
                $query->where('case_status', '!=', 0);
            }
        }

        $cases = $query->paginate(20);

        return view('cases.index', compact('cases', 'sortBy', 'sortOrder', 'caseStatus'));
    }


    public function create()
    {
        if (auth()->user()->can('cases')) {

            $visitors = Visitor::where('visitor_status', '1')->get();
            $users = User::role('advocate')->get();
            $articles = Article::all();
            $categories = Category::all();

            return view('cases.create', compact(
                'visitors',
                'categories',
                'users',
                'articles',
            ));
        }
        abort(404);
    }

    public function store(CreateCaseRequest $request)
    {
        if (auth()->user()->can('cases')) {
            CourtCase::create($request->validated());
            return redirect()->back()->with('status', 'Справу успішно відкрито!');
        }
    }

    public function show(string $id)
    {
        $case = CourtCase::where('id', $id)->first();
        return view('cases.card', compact('case'));
    }

    public function edit(string $id)
    {

        $case = CourtCase::where('id', $id)->first();
        $visitors = Visitor::where('visitor_status', '1')->get();
        $users = User::role('advocate')->get();
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

        // ToDo maybe close case add to destroy method
    }

    public function destroy(string $id)
    {
        abort(404);
    }
}
