<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityContoller extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
    *public function index()
    *{
    *    $cities= \App\City::all();
    *    return view('cities.index', ['cities'=>$cities]);
    *}*/
    /**
     * Display a listing of the resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($num=null)
    {
        if($num==null)
            $num=0;
        switch($num){
           case 0:
                $cities= \App\City::all()->sortBy('name');
            case 1:
                $cities= \App\City::all()->sortBy('state');
            case 2:
                $cities= \App\City::all()->sortBy('population_rank');
            case 3:
                $cities= \App\City::all()->sortByDesc('population_2010');
        }
        return view('cities.index', ['cities'=>$cities]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required',
            'state'=>'required',
            'population_2010'=>'required',
            'population_rank'=>'required'
        ]);

        \App\City::create($validatedData);
        
        //Valid and correct
        return redirect()->route('cities.index')->with('success','City was added successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city=\App\City::find($id);
        return view('cities.show',['city'=>$city]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Ecity=\App\City::find($id);
        return view('cities.edit', ['city'=>$Ecity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'name'=>'required',
            'state'=>'required',
            'population_2010'=>'required',
            'population_rank'=>'required'
        ]);

        \App\City::find($id)->update($validatedData);
        
        //Valid and correct
        return redirect()->route('cities.index')->with('success','City was UPdated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Dcity=\App\City::find($id);
        $Dcity->delete();

        return redirect()->route('cities.index')->with('success','City was removed successfuly');
    }
}
