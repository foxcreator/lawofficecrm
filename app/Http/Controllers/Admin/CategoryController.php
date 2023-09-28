<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function store(CreateCategoryRequest $request)
    {

        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => 'unique:categories,name|max:25',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }

            // Если валидация успешна, создайте категорию
            $category = Category::create($request->validated());

            if ($category) {
                session()->flash('status', 'Категорію успішно додано');
                return response()->json(['success' => 'Категорію успішно додано']);
            }
        }
        $category = Category::create($request->validated());

        if ($category) {
            return redirect()->back()->with('status', "Категорії успішно додані");
        }
    }
}
