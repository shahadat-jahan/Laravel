<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use App\ProductPurchase;
use App\Exports\ReportExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\PDF;
use Maatwebsite\Excel\Facades\Excel;

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

        $data = $rowspanArr = [];
        $customers = Customer::select(DB::raw("id, CONCAT(fname, ' ', lname) as name"))
            ->where('status', '1')->pluck('name', 'id')->toArray();

        if ($request->generate == 'true') {
            $f_d = $request->from_date;
            $t_d = $request->to_date;
            $c_id = $request->customer_id;
            $startDate = !empty($f_d) ? date('Y-m-d', strtotime($f_d)) . ' 00:00:00' : '';
            $endDate = !empty($t_d) ? date('Y-m-d', strtotime($t_d)) . ' 23:59:59' : '';

            $purchaseDetailsInfo = ProductPurchase::join('orders', 'orders.id', 'product_purchases.order_id')
                ->join('products', 'products.id', 'product_purchases.product_id')
                ->join('customers', 'customers.id', 'orders.customer_id')
                ->select(
                    'orders.id as order_id',
                    'orders.order_no',
                    'orders.created_at',
                    'orders.customer_id',
                    DB::raw("CONCAT(customers.fname, ' ', customers.lname) as customer"),
                    'products.name as product',
                    'product_purchases.product_id',
                    'product_purchases.qty',
                );
            if (!empty($request->customer_id)) {
                $purchaseDetailsInfo = $purchaseDetailsInfo->where('orders.customer_id',  $c_id);
            }
            $purchaseDetailsInfo = $purchaseDetailsInfo->whereBetween('orders.created_at', [$startDate, $endDate])
                ->orderBy('orders.created_at', 'desc')
                ->get();

            $purchaseArr = [];
            if (!$purchaseDetailsInfo->isEmpty()) {
                foreach ($purchaseDetailsInfo as $purchase) {
                    //order data
                    $data[$purchase->order_id]['order_no'] = $purchase->order_no;
                    $data[$purchase->order_id]['customer_id'] = $purchase->customer_id;
                    $data[$purchase->order_id]['customer'] = $purchase->customer;
                    $data[$purchase->order_id]['created_at'] = !empty($purchase->created_at) ? date('d F Y', strtotime($purchase->created_at)) : '';
                    //purchase data
                    $data[$purchase->order_id]['purchase'][$purchase->product_id]['product'] = $purchase->product;
                    $data[$purchase->order_id]['purchase'][$purchase->product_id]['qty'] = $purchase->qty;

                    $rowspanArr[$purchase->order_id] = !empty($rowspanArr[$purchase->order_id]) ? $rowspanArr[$purchase->order_id] : 0;
                    $rowspanArr[$purchase->order_id] += 1;
                }
            }
        }
        if ($request->view == 'print') {
            return view("orders.include.reportPDF", compact('data', 'rowspanArr'));
        } elseif ($request->download == 'pdf') {
            $pdf = PDF::loadView('orders.include.reportPDF', compact('data', 'rowspanArr'));
            // return $pdf->download('report.pdf');
            return $pdf->stream();
        } elseif ($request->export == 'exel') {
            // return redirect('/orders/export-report')->with('data', $data);
            return redirect()->route('orders.exportReport', ['data' => $data]);
        } else {
            return view("orders.report", compact('customers', 'data', 'rowspanArr'));
        }
    }

    public function showReport(Request $request)
    {
        $rules = [
            'from_date' => 'required|before:today',
            'to_date' => 'required|after:from_date'
        ];
        $message = [
            'from_date.required' => 'Please give the from date!',
            'to_date.required' => 'Please give the to date!',
        ];

        $url =  'from_date=' . $request->from_date . '&to_date=' . $request->to_date
            . '&customer_id=' . $request->customer_id;

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return redirect('/orders/report?generate=false&' . $url)
                ->withErrors($validator)
                ->withInput();
        }
        return redirect('/orders/report?generate=true&' . $url);
    }

    public function exportReport(Request $request)
    {
        // echo "<pre>";
        // print_r($request->data);
        // exit;
        $export = new ReportExport([
            $request->data
        ]);
        return Excel::download($export, 'report.xlsx');
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
