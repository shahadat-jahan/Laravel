<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\ProductPurchase;
use App\Order;
use Illuminate\Http\Request;

class ProductPurchaseController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$search = $request->search;
		$purchases = ProductPurchase::orderBy('id');

		if (!empty($search)) {
			$purchases = $purchases->whereHas('order', function ($q) use ($search) {
				$q->where('order_no', 'like', $search . '%');
			});
		}
		$purchases = $purchases->paginate(session()->get('paginateCount') ?? '5');
		return view("productPurchases.index", compact('purchases'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$customers = Customer::all();
		$products = Product::where('status', '=', 1)->get();
		return view("productPurchases.create", compact('customers', 'products'));
	}

	public function row(Request $request)
	{
		$selectedId = $request->id;
		$customers = Customer::all();
		$products = Product::where('status', '=', 1)->get();
		$view = view('productPurchases.row', compact('customers', 'products', 'selectedId'))->render();
		return response()->json(['html' => $view]);
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
			'order_no' => 'required|unique:orders|max:50',
			'customer_id' => 'required',
		]);

		//order save
		$order = new Order;

		$order->order_no = $request->order_no;
		$order->customer_id = $request->customer_id;
		if ($order->save()) {
			$data = [];
			if (!empty($request->product)) {
				$i = 0;
				foreach ($request->product as $key => $name) {
					$data[$i]['order_id'] = $order->id;
					$data[$i]['product_id'] = $name['product_id'];
					$data[$i]['qty'] = $name['qty'];
					$i++;
				}
			}
			ProductPurchase::insert($data); // Eloquent approach
		}
		return redirect()->route('productPurchases.index');
	}

	public function search(Request $request)
	{
		$url = '/product-purchases/?' . 'search=' . $request->keyword;
		return redirect($url);
	}

	public function limit(Request $request)
	{
		$url = '/product-purchases/';
		session()->put('paginateCount', $request->limit);
		return redirect($url);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\ProductPurchase  $productPurchase
	 * @return \Illuminate\Http\Response
	 */
	public function show(ProductPurchase $productPurchase)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\ProductPurchase  $productPurchase
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$order = Order::find($id);
		$purchase = ProductPurchase::where('order_id', '=', $id)->get();
		$customers = Customer::all();
		$products = Product::where('status', '=', 1)->get();
		return view("productPurchases.edit", compact('order', 'purchase', 'customers', 'products'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\ProductPurchase  $productPurchase
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$id = $request->id;
		$purchaseUpdate = ProductPurchase::find($id);
		$purchaseUpdate->customer_id = $request->customer_id;
		$purchaseUpdate->product_id = $request->product_id;
		$purchaseUpdate->qty = $request->qty;
		$purchaseUpdate->save();

		return redirect()->route('productPurchases.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\ProductPurchase  $productPurchase
	 * @return \Illuminate\Http\Response
	 */

	public function destroy($id)
	{
		ProductPurchase::find($id)->delete();
		return redirect()->back();
	}
}
