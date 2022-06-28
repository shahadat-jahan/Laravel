<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Division;
use App\District;
use App\Thana;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class CustomerController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$customers = Customer::select('customers.*', 'divisions.name as division_name', 'districts.name as district_name', 'thanas.name as thana_name')
			->leftJoin('divisions', 'divisions.id', '=', 'customers.division_id')
			->leftJoin('districts', 'districts.id', '=', 'customers.district_id')
			->leftJoin('thanas', 'thanas.id', '=', 'customers.thana_id');

		if (!empty($request->search)) {
			$customers = $customers->where('customers.fname', 'like', $request->search . '%')
				->orWhere('customers.lname', 'like', $request->search . '%');
		}
		$customers = $customers->paginate(session()->get('paginateCount') ?? '5');
		return view("customers.index", compact('customers'));
	}

	public function modal(Request $request)
	{
		$id = $request->id;
		$modal = Customer::where('id', '=', $id)->first();
		$view = view('customers.getDetail', compact("modal"))->render();
		return response()->json(['html' => $view]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$divisions = Division::orderBy('name')->get();

		return view("customers.create", compact('divisions'));
	}

	public function getDistrict(Request $request)
	{
		$id = $request->id;
		$districts = District::orderBy('name')
			->where('division_id', '=', $id)
			->get();
		$view = view('customers.getDistrict', compact("districts"))->render();
		return response()->json(['html' => $view]);
	}

	public function getThana(Request $request)
	{
		$id = $request->id;
		$thanas = Thana::orderBy('name')
			->where('district_id', '=', $id)
			->get();
		$view = view("customers.getThana", compact('thanas'))->render();
		return response()->json(['html' => $view]);
	}

	public function chngStatus(Request $request)
	{
		$id = $request->id;
        $status = $request->status;
        //$btn= $request->btn;
        $stat = !empty($status) ? '0' : '1';
		$statusUpdate = Customer::find($id);
        $statusUpdate->status = $stat;
        if ($statusUpdate->save()) {
            return Response::json(['success' => true, 'heading' => __('lebel.SUCCESS')], 200);
        } else {
            return Response::json(['success' => false, 'heading' => __('lebel.ERROR')], 401);
        }
    
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
			'fname' => 'required|string|max:255',
			'lname' => 'required',
			'username' => 'required|unique:customers|max:100',
			'password' => 'required',
			'gender' => 'required',
			'division_id' => 'required',
			'district_id' => 'required',
			'thana_id' => 'required',
			'address' => 'required',
			'status' => 'required',
			'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
		]);
		if ($request->hasFile('image')) {
			$file = $request->file('image');
		}
		$filename = 'Customer' . time() . '.' . $file->extension();
		$file->move(public_path("images"), $filename);

		$customer = new Customer;

		$customer->fname = $request->fname;
		$customer->lname = $request->lname;
		$customer->username = $request->username;
		$customer->password = Hash::make($request->password);
		$customer->gender = $request->gender;
		$customer->division_id = $request->division_id;
		$customer->district_id = $request->district_id;
		$customer->thana_id = $request->thana_id;
		$customer->address = $request->address;
		$customer->status = $request->status;
		$customer->image = $filename;
		$customer->save();

		return redirect()->route('customers.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Customer  $customer
	 * @return \Illuminate\Http\Response
	 */
	public function search(Request $request)
	{
		$url = '/customers/?' . 'search=' . $request->keyword;
		return redirect($url);
	}

	public function limit(Request $request)
	{
		$url = '/customers/';
		session()->put('paginateCount', $request->limit);
		return redirect($url);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Customer  $customer
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$customer = Customer::find($id);
		$divisions = Division::orderBy('name')->get();
		return view("customers.edit", compact('customer', 'divisions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Customer  $customer
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$id = $request->id;
		$this->validate($request, [
			'fname' => 'required|string|max:255',
			'lname' => 'required',
			'username' => 'required|unique:customers,username,' . $id . '|max:50',
			'gender' => 'required',
			'division_id' => 'required',
			'district_id' => 'required',
			'thana_id' => 'required',
			'address' => 'required'
		]);

		$customerUpdate = Customer::find($id);
		$customerUpdate->fname = $request->fname;
		$customerUpdate->lname = $request->lname;
		$customerUpdate->username = $request->username;
		$customerUpdate->gender = $request->gender;
		$customerUpdate->division_id = $request->division_id;
		$customerUpdate->district_id = $request->district_id;
		$customerUpdate->thana_id = $request->thana_id;
		$customerUpdate->address = $request->address;
		$customerUpdate->status = $request->status;
		if ($request->hasFile('image')) {
			$file = $request->file('image');
			$filename = 'Customer' . time() . '.' . $file->extension();
			$file->move(public_path("images"), $filename);
			$customerUpdate->image = $filename;
		}
		$customerUpdate->save();
		return redirect()->route('customers.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Customer  $customer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		Customer::find($id)->delete();
		return redirect()->back();
	}
}
