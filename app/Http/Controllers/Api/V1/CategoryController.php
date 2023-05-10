<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\V1\CategoryResource;
use App\Models\Category;
use App\Http\Resources\V1\CategoryCollection;


class CategoryController extends Controller
{
    //

    public function index()
    {
        return new CategoryCollection(Category::all());
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());
        return response()->json("Categoria creada correctamente");
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json("Categoria actualizada correctamente");
    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json("Categoria eliminada correctamente");
    }

}
