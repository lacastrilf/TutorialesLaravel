<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{

    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Products - Online Store';
        $viewData['subtitle'] = 'List of products';
        $viewData["products"] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        if ($id < 1 || $id > count(Product::all())) {
            return redirect()->route('home.index');
        }

        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['title'] = $product['name'].' - Online Store';
        $viewData['subtitle'] = 'Product information';
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; // to be sent to the view
        $viewData['title'] = 'Create product';

        return view('product.create')->with('viewData', $viewData);
    }

    public function save(Request $request):RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric|gt:0',
        ])->validate();

        Product::create($request->only(["name","price"]));

        return back();
    }
}
