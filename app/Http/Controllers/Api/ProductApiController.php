<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Product::with(['supplier:id,name', 'inventory:id,product_id,quantity'])
            ->where('status', 'active');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(12);

        return response()->json($products);
    }

    public function show(Product $product): JsonResponse
    {
        return response()->json(
            $product->load(['supplier:id,name', 'inventory:id,product_id,quantity'])
        );
    }
}
