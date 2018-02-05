<?php

namespace App\Http\Controllers;

use App\like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Like::all();
        return $c;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('like.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $like = new Like();

        $like->profile_id = $request->profile_id;
        $like->post_id = $request->post_id;

        $like->save();

        return $like;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $like = Like::where('_id',$id)->first();

        $like->profile_id = $request->profile_id;
        $like->post_id = $request->post_id;

        $like->save();

        return $like;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $like = Like::where('_id',$id)->first();
         $like->delete();
         return response()->json("Data Deleted");
    }
}
