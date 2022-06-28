<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::orderBy('name');

        if (!empty($request->search)) {
            $products = $products->where('code', 'like', $request->search . '%');
        }
        $products = $products->paginate(session()->get('paginateCount') ?? '5');
        return view("products.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products|string|max:255',
            'code' => 'required|unique:products|max:255',
            'des' => 'required|max:255',
            'status' => 'required',
        ]);

        $product = new Product;

        $product->name = $request->name;
        $product->code = $request->code;
        $product->des = $request->des;
        $product->status = $request->status;
        $product->save();
        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $url = '/products/?' . 'search=' . $request->keyword;
        return redirect($url);
    }

    public function limit(Request $request)
    {
        $url = '/products/';
        session()->put('paginateCount', $request->limit);
        return redirect($url);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view("products.edit", compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $productUpdate = Product::find($id);
        $productUpdate->name = $request->name;
        $productUpdate->code = $request->code;
        $productUpdate->des = $request->des;
        $productUpdate->status = $request->status;
        $productUpdate->save();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
}
