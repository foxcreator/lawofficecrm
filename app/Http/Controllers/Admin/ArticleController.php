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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:articles,name|max:25',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $article = Article::create($request->validated());

        if ($article) {
            return response()->json(['success' => 'Стаття успішно додана']);
        } else {
            return response()->json(['error' => 'Smth is wrong'], 500);
        }

    }
}

