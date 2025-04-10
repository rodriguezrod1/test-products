<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->middleware('auth');
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search');
            $sortField = $request->input('sort_field');
            $sortOrder = $request->input('sort_order');

            $products = $this->productService->getFilteredProducts($search, $sortField, $sortOrder);

            return response()->json($products);
        }

        return view('products.index');
    }
}
