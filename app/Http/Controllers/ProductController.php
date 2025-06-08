<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Show all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show product creation form
    public function create()
    {
        return view('products.create');
    }

    // Store a new product
    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|unique:products,product_code',
            'pname' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        Product::create($request->only(['product_code', 'pname', 'quantity']));

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // Show product edit form
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update product info
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_code' => 'required|string|max:255',
            'pname' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only(['product_code', 'pname', 'quantity']));

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    // Show stock-in form
    public function stockInForm($id)
    {
        $product = Product::findOrFail($id);
        return view('products.stockin', compact('product'));
    }

    // Process stock-in
    public function stockIn(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $product = Product::findOrFail($id);
        $product->quantity += $request->quantity;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Stock added successfully.');
    }

    // Show stock-out form
    public function stockOutForm($id)
    {
        $product = Product::findOrFail($id);
        return view('products.stockout', compact('product'));
    }

    // Process stock-out
    public function stockOut(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);

        $product = Product::findOrFail($id);

        if ($product->quantity < $request->quantity) {
            return back()->withErrors(['quantity' => 'Not enough stock to remove the requested quantity.']);
        }

        $product->quantity -= $request->quantity;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Stock removed successfully.');
    }
}
