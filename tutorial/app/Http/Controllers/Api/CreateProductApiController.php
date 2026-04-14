<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProductRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class CreateProductApiController extends Controller 
{
 public function save(ProductRequest $request): JsonResponse
    {
        $product = Product::create($request->only(['name', 'price']));

        return response()->json([
            'message' => 'Producto creado exitosamente',
            'product' => $product
        ], 201);
    }
}