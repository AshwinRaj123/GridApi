<?php

namespace App\Http\Controllers;

use App\interest;
use Illuminate\Http\Request;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Interest::all();
        return $c;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interest.create');
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
            'title' =>'required'
            ));

        $interest = new Interest();

        $interest->title = $request->title;
        $interest->decription = $request->description;
        $interest->followersCount = $request->followersCount;

        $interest->save();

        return $interest;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interest = Interest::where('_id',$id)->first();
        return $interest;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $interest = Interest::where('_id',$id)->first();
         return view('interest.edit')->withProfile($interest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $interest = Interest::where('_id',$id)->first();

        $interest->title = $request->title;
        $interest->decription = $request->description;
        $interest->followersCount = $request->followersCount;

        $interest->save();

        return $interest;   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        
        $profile = Interest::find($id);
        $profile->delete();

        return response()->json('Deleted Successfully');
    
    }
}
