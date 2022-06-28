<?php

namespace App\Http\Controllers;

use App\Order;
use App\ProductPurchase;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
		$orders = Order::orderBy('id');

		if (!empty($search)) {
			$orders = $orders->whereHas('customer', function ($q) use ($search) {
				$q->where('fname', 'like', $search . '%')
					->orWhere('lname', 'like', $search . '%');
			});
		}
		$orders = $orders->paginate(session()->get('paginateCount') ?? '5');
		return view("orders.index", compact('orders'));
    }

    public function search(Request $request)
	{
		$url = '/orders/?' . 'search=' . $request->keyword;
		return redirect($url);
	}

    public function limit(Request $request)
	{
		$url = '/orders/';
		session()->put('paginateCount', $request->limit);
		return redirect($url);
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductPurchase::where('order_id', '=', $id)->delete();
        Order::find($id)->delete();
		return redirect()->back();
    }
}