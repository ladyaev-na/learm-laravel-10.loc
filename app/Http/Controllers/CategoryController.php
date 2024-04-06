<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Отоброжение всего
    public function index(){
        $categories = Category::all();
        if ($categories){
            return response()->json($categories)->setStatusCode(200);
        }else{
            throw new ApiException(404,'Not Found');
        }
    }

    // Отоброжение текущего
    public function show($id){
        $category = Category::find($id);
        if ($category){
            return response()->json($category)->setStatusCode(200);
        }else{
            return response()->json()->setStatusCode(404, 'Not Found');
        }
    }

    // Создание
    public function store(CreateCategoryRequest $request){
        $category = new Category($request->all());
        $category->save();
        return response()->json($category)->setStatusCode(201);
    }

    // Частичное обнавление
    public function update(UpdateCategoryRequest $request, $id){
        $category = Category::find($id);
        if ($category){
            $category->update($request->all());
            return response()->json($category)->setStatusCode(200);
        }else{
            throw new ApiException(404,'Not Found');
        }
    }

    // Удаление
    public function destroy($id){
        $category = Category::find($id);
        if ($category){
            Category::destroy($id);
            return response()->json()->setStatusCode(204);
        }else{
            throw new ApiException(404,'Not Found');
        }
    }
}
