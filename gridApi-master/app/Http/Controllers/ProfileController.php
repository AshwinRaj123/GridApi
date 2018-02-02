<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Hash;
use Storage;
use Config;
use App\Profile;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $c = Profile::all();
        return $c;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$this->validate($request, array(
            'image' =>'required'
            ));*/

        $profile = new Profile();

        $profile->mobile = $request->mobile;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->password = $request->password;
        /*$profile->gender = $request->gender;
        $profile->pro_tag_line = $request->pro_tag_line;
        $profile->location = $request->location;
        $profile->languages = $request->languages;
        $profile->fb_page = $request->fb_page;
        $profile->twitter_page = $request->twitter_page;
        $profile->insta_page = $request->insta_page;
        $profile->youtube_page = $request->youtube_page;*/

        //upload profile_pics to s3 servers
        
       /* $upload_url1 = 'http://s3.amazonaws.com/';
        $upload_folder = '/data/';

         $image = $request->file('image');
         $imageFileName = time() . '.' . $image->getClientOriginalExtension();
         $s3 = \Storage::disk('s3');
         $filePath = '/data/' . $imageFileName;
         $va = $s3->put($filePath, file_get_contents($image), 'public');
         $profile ->pro_pic = $upload_url1.config('filesystems.disks.s3.bucket').$upload_folder.$imageFileName;
*/
        $profile->save();

        return $profile;


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::where('_id' , $id)->first();
        return $profile;
    }

    /* *
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
   */  
    public function edit($id)
    {
        $profile = Profile::where('_id' , $id)->first();
       return view('profile.edit')->withProfile($profile);
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
        // $this->validate($request, array(
        //     'name' =>'required'
        //     ));

        $profile = Profile::where('_id' , $id)->first();


        $profile->mobile = $request->mobile;
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->dob = $request->dob;
        $profile->gender = $request->gender;
        $profile->pro_tag_line = $request->pro_tag_line;
        $profile->location = $request->location;
        $profile->languages = $request->languages;
        $profile->fb_page = $request->fb_page;
        $profile->twitter_page = $request->twitter_page;
        $profile->insta_page = $request->insta_page;
        $profile->youtube_page = $request->youtube_page;

        $upload_url1 = 'http://s3.amazonaws.com/';
        $upload_folder = '/data/';

         $image = $request->file('image');
         $imageFileName = time() . '.' . $image->getClientOriginalExtension();
         $s3 = \Storage::disk('s3');
         $filePath = '/data/' . $imageFileName;
         $va = $s3->put($filePath, file_get_contents($image), 'public');
         $profile ->pro_pic = $upload_url1.config('filesystems.disks.s3.bucket').$upload_folder.$imageFileName;

        $profile->save();

        return $profile;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::where('_id' ,$id)->first();
        $profile->destroy();

        return response()->json('Deleted Successfully');
    }
 }
