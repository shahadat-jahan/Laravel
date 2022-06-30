<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use App\ProductPurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use PDF;

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
    public function report(Request $request)
    {
        $f_d = $request->f_date;
        $t_d = $request->t_date;
        $c_id = $request->customer_id;
        $data = [];
        $rowspanArr = [];
        $customers = Customer::all();
        if (!empty($f_d) && !empty($t_d)) {
            $startDate = Carbon::createFromFormat('Y-m-d', $f_d)->format('Y-m-d 00:00:00');
            $endDate = Carbon::createFromFormat('Y-m-d', $t_d)->format('Y-m-d 23:59:59');
            $report = Order::whereBetween('created_at', [$startDate, $endDate])
                ->where('customer_id', '=', $c_id)->get();

          
            if (!empty($report)) {
                foreach ($report as $key => $value) {
                    $data[$value['customer_id']]['customer_name'] = $value->customer->fname . ' ' . $value->customer->lname;
                    $data[$value['customer_id']]['order'][$value['id']]['order_no'] = $value['order_no'];
                    $product = ProductPurchase::select('product_id')->where('order_id', '=', $value['id'])->get();
                    foreach ($product as $k => $v) {
                        $data[$value['customer_id']]['order'][$value['id']]['product'][$v['product_id']]['product_name'] = $v->product->name;
                    }
                }
            }
        
           
            if (!empty($data)) {
                foreach ($data as $customerId => $customerInfo) {
                    if (!empty($customerInfo['order'])) {
                        foreach ($customerInfo['order'] as $orderId => $orderInfo) {
                            if (!empty($orderInfo['product'])) {
                                foreach ($orderInfo['product'] as $productId => $productInfo) {

                                    $rowspanArr['customer'][$customerId] = !empty($rowspanArr['customer'][$customerId]) ? $rowspanArr['customer'][$customerId] : 0;
                                    $rowspanArr['customer'][$customerId] += 1;

                                    $rowspanArr['order'][$customerId][$orderId] = !empty($rowspanArr['order'][$customerId][$orderId]) ? $rowspanArr['order'][$customerId][$orderId] : 0;
                                    $rowspanArr['order'][$customerId][$orderId] += 1;

                                    $rowspanArr['product'][$customerId][$orderId][$productId] = !empty($rowspanArr['product'][$customerId][$orderId][$productId]) ? $rowspanArr['product'][$customerId][$orderId][$productId] : 0;
                                    $rowspanArr['product'][$customerId][$orderId][$productId] += 1;
                                }
                            }
                        }
                    }
                }
            }
        }
        View::share(compact('customers', 'data', 'rowspanArr'));
        if($request->has('download')){  
            $pdf = PDF::loadView('orders.include.reportPDF');  
            return $pdf->stream();  
        }
        return view("orders.report");
    }

    public function showReport(Request $request)
    {
        $url = '/orders/report/?' . 'f_date=' . $request->from_date . '&t_date=' . $request->to_date . '&customer_id=' . $request->customer_id;
        return redirect($url);
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
