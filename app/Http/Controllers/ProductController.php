<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Отоброжение всего
    public function index(){
        $products = Product::all();
        if ($products){
            return response()->json($products)->setStatusCode(200);
        }else{
            throw new ApiException(404,'Not Found');
        }
    }

    // Отоброжение текущего
    public function show($id){
        $product = Product::find($id);
        if ($product){
            return response()->json($product)->setStatusCode(200);
        }else{
            return response()->json()->setStatusCode(404, 'Not Found');
        }
    }

    // Создание
    public function store(CreateProductRequest $request){
        $product = new Product($request->all());
        $product->save();
        return response()->json($product)->setStatusCode(201);
    }

    // Частичное обнавление
    public function update(UpdateProductRequest $request, $id){
        $product = Product::find($id);
        if ($product){
            $product->update($request->all());
            return response()->json($product)->setStatusCode(200);
        }else{
            throw new ApiException(404,'Not Found');
        }
    }

    // Удаление
    public function destroy($id){
        $product = Product::find($id);
        if ($product){
            Product::destroy($id);
            return response()->json()->setStatusCode(204);
        }else{
            throw new ApiException(404,'Not Found');
        }
    }
}
