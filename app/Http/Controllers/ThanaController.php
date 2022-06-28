<?php

namespace App\Http\Controllers;

use App\District;
use App\Thana;
use Illuminate\Http\Request;

class ThanaController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
	{
        $thanas = Thana::orderBy('name')->paginate(session()->get('paginateCount') ?? '5');
        return view("thanas.index", compact('thanas'));
    }

    public function limit(Request $request)
	{
		$url = '/thanas/';
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
       
        $districts = District::orderBy('name')->pluck('name','id')->toArray();
        return view('thanas.create',compact('districts'));
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
			'district_id' => 'required',
			'name' => 'required|unique:thanas|string|max:255'
        ]);
        $thana = new Thana;
        $thana->district_id = $request->district_id;
        $thana->name = $request->name;
		$thana->save();

        return redirect()->route('thanas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function show(Thana $thana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function edit(Thana $thana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thana $thana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thana  $thana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Thana::find($id)->delete();
	return redirect()->back();
    }
}