<?php

namespace App\Http\Controllers;

use App\languages;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Languages::all();
        return $c;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('languages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name'=>'required'
        ));

        $languages = new Languages();

        $languages->name = $request->name;
        $languages->total_people = $request->total_people;

        $languages->save();
        return $languages;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $languages = Languages::with('profile')->get();
        return $languages;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $languages = Languages::where('_id',$id)->first();

        $languages->name = $request->name;
        $languages->total_people = $request->total_people;

        $languages->save();
        return $languages;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\languages  $languages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $languages = Languages::find($id);

        $languages->delete();

        return response()->json("Data Deleted");
    }
}
