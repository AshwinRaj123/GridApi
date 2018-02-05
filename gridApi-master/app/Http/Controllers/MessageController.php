<?php

namespace App\Http\Controllers;

use App\message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Message::all();
        return $c;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('message.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();

        $message->from_id = $request->from_id;
        $message->to_id = $request->to_id;
        $message->seen = $request->seen;
        $message->mediaObject = $request->mediaObject;
        $message->received = $request->received;

        $message->save();
        return $message;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = Message::where('_id',$id)->first();

        $message->from_id = $request->from_id;
        $message->to_id = $request->to_id;
        $message->seen = $request->seen;
        $message->mediaObject = $request->mediaObject;
        $message->received = $request->received;

        $message->save();
        return $message;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::where('_id',$id)->first();

        $message->delete();

        return response()->json("Data Deleted");
    }
}
