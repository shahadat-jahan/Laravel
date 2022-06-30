<?php

namespace App\Http\Controllers;

use App\Customer;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$customers = Customer::select('customers.*', 'divisions.name as division_name', 'districts.name as district_name', 'thanas.name as thana_name')
			->leftJoin('divisions', 'divisions.id', '=', 'customers.division_id')
			->leftJoin('districts', 'districts.id', '=', 'customers.district_id')
			->leftJoin('thanas', 'thanas.id', '=', 'customers.thana_id')
			->get();

		$customer = [];
		foreach ($customers as $key => $row) {
			$customer[$row['division_id']]['division_name'] = $row['division_name'];
			$customer[$row['division_id']]['district'][$row['district_id']]['district_name'] = $row['district_name'];
			$customer[$row['division_id']]['district'][$row['district_id']]['thana'][$row['thana_id']]['thana_name'] = $row['thana_name'];
			$customer[$row['division_id']]['district'][$row['district_id']]['thana'][$row['thana_id']]['user'][$row['id']]['first_name'] = $row['fname'];
			$customer[$row['division_id']]['district'][$row['district_id']]['thana'][$row['thana_id']]['user'][$row['id']]['last_name'] = $row['lname'];
			$customer[$row['division_id']]['district'][$row['district_id']]['thana'][$row['thana_id']]['user'][$row['id']]['username'] = $row['username'];
		}
		$rowspanArr = [];

		if (!empty($customer)) {
			foreach ($customer as $divId => $divInfo) {
				if (!empty($divInfo['district'])) {
					foreach ($divInfo['district'] as $disId => $disInfo) {
						if (!empty($disInfo['thana'])) {
							foreach ($disInfo['thana'] as $thId => $thInfo) {
								if (!empty($thInfo['user'])) {
									foreach ($thInfo['user'] as $uId => $uInfo) {

										$rowspanArr['div'][$divId] = !empty($rowspanArr['div'][$divId]) ? $rowspanArr['div'][$divId] : 0;
										$rowspanArr['div'][$divId] += 1;

										$rowspanArr['dis'][$divId][$disId] = !empty($rowspanArr['dis'][$divId][$disId]) ? $rowspanArr['dis'][$divId][$disId] : 0;
										$rowspanArr['dis'][$divId][$disId] += 1;

										$rowspanArr['th'][$divId][$disId][$thId] = !empty($rowspanArr['th'][$divId][$disId][$thId]) ? $rowspanArr['th'][$divId][$disId][$thId] : 0;
										$rowspanArr['th'][$divId][$disId][$thId] += 1;
									}
								}
							}
						}
					}
				}
			}
		}
		$totalUsers = User::count();
		$totalCustomers = Customer::count();
		$totalOrders = Order::count();
		$time = Carbon::now()->subDays(3)->format('Y-m-d H:i:s');
		$new = Customer::where('created_at', '>', $time)->count();
		echo "<pre>";
        print_r($rowspanArr);
		return view("home", compact('customer', 'rowspanArr', 'totalUsers', 'totalCustomers', 'new', 'totalOrders'));
	}

	public function newCustomerModal(Request $request)
	{
		$time = Carbon::now()->subDays(3)->format('Y-m-d H:i:s');
		$newCustomers = Customer::where('created_at', '>', $time)->get();
		$view = view('newCustomerModal', compact("newCustomers"))->render();
		return response()->json(['html' => $view]);
	}
	public function gallery()
	{
		return view("gallery");
	}

	public function image(Request $request)
	{
		$this->validate($request, [
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
		}
		$filename = $file->getClientOriginalName();
		$file->move(public_path("images"), $filename);
		// echo "<pre>";
		// print_r($filename);
		// exit;
		return redirect()->route('home');
	}

	public function about()
	{
		return view("about");
	}

	public function contact()
	{
		return view("contact");
	}
}
