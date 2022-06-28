<?php

namespace App\Http\Controllers;

use App\Division;
use App\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
	{
        $districts = District::orderBy('name')->paginate(session()->get('paginateCount') ?? '5');
        return view("districts.index", compact('districts'));
    }

    public function limit(Request $request)
	{
		$url = '/districts/';
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
        $divisions = Division::orderBy('name')->pluck('name','id')->toArray();
        return view('districts.create',compact('divisions'));
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
			'division_id' => 'required',
			'name' => 'required|unique:districts|string|max:255'
        ]);
        $district = new District;
        $district->division_id = $request->division_id;
        $district->name = $request->name;
		$district->save();

        return redirect()->route('districts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\District  $district
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      District::find($id)->delete();
	return redirect()->back();
    }
}
