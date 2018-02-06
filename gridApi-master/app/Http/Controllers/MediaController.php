<?php

namespace App\Http\Controllers;

use App\media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Media::all();
        return $c;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $media = new Media();

        $media->profile_id = $request->profile_id;
        $media->title = $request->title;
        $media->type = $request->type;
        $media->source_id = $request->source_id;

         //upload media to s3 servers
        
        $upload_url1 = 'http://s3.amazonaws.com/';
        $upload_folder = '/data/media/';

         $image = $request->file('file');
         $imageFileName = time() . '.' . $image->getClientOriginalExtension();
         $s3 = \Storage::disk('s3');
         $filePath = '/data/media/' . $imageFileName;
         $va = $s3->put($filePath, file_get_contents($image), 'public');
         $media ->pro_pic = $upload_url1.config('filesystems.disks.s3.bucket').$upload_folder.$imageFileName;

         $media->save();

         return $media;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $media = Media::where('_id',$id)->first();

        $media->profile_id = $request->profile_id;
        $media->title = $request->title;
        $media->type = $request->type;
        $media->source_id = $request->source_id;

         //upload media to s3 servers
        
        $upload_url1 = 'http://s3.amazonaws.com/';
        $upload_folder = '/data/media/';
         ini_set('memory_limit','256M');
         $image = $request->file('file');
         $imageFileName = time() . '.' . $image->getClientOriginalExtension();
         $s3 = \Storage::disk('s3');
         $filePath = '/data/media/' . $imageFileName;
         $va = $s3->put($filePath, file_get_contents($image), 'public');
         $media ->pro_pic = $upload_url1.config('filesystems.disks.s3.bucket').$upload_folder.$imageFileName;

         $media->save();

         return $media;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media = Media::where('_id',$id)->first();

        $media->delete();

        return response()->json("Media Deleted");
    }
}
