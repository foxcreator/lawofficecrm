<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function store(CreateArticleRequest $request)
    {

        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:articles,name|max:25',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }

            $category = Article::create($request->validated());

            if ($category) {
                session()->flash('status', 'Стаття успішно додана');
                return response()->json(['success' => 'Стаття успішно додана']);
            }
        }
        $category = Article::create($request->validated());

        if ($category) {
            return redirect()->back()->with('status', "Стаття успішно додана");
        }
    }
}
