<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(ProductRequest $request) {
        $params = $request->all();
        $products = Product::query()
            ->where('active', true);

        if ($search = $params['search'] ?? null) {
            $products->where('name', 'like', "%{$search}%");
        }

        if ($fromDate = $params['from_date'] ?? null) {
            $products->where('published_at', '>=', new Carbon($fromDate));
        }

        if ($toDate = $validated['to_date'] ?? null) {
            $products->where('published_at', '<=', new Carbon($toDate));
        }
        $products = $products
            ->paginate(10);

        return view('products', compact('products'));
    }

    public function show($id) {
        $product = Product::query()->where('id', $id)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return view('show', compact('product'));
    }

    public function edit($id) {
        $product = Product::query()->where('id', $id)->first();

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return view('edit', compact('product'));
    }

    public function create(Request $request, $id) {
        return view('create');
    }

    public function store(Request $request) {
        //Validation
        //...
        DB::beginTransaction();
        $product = (new Product)->fillAttributes($request->all());
        $product->save();
        DB::commit();
        return redirect()->route('show', compact('product'));
    }

    public function update(Request $request, $id) {
        //Validation
        //...
        DB::beginTransaction();
        $product = Product::query()->where('id', $id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->update([$request->all()]);
        DB::commit();

        return redirect()->route('show', compact('product'));
    }

    public function delete(Request $request, $id) {
        //Validation
        //...
        DB::beginTransaction();
        $product = Product::query()->where('id', $id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        DB::commit();

        return redirect()->route('products');
    }

}
