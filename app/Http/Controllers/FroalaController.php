<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FroalaController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('froala');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        if($request->hasFile('file')) {
            $originName = $request->file('file')->getClientOriginalName();
            $fileName   = pathinfo($originName, PATHINFO_FILENAME);
            $extension  = $request->file('file')->getClientOriginalExtension();
            $fileName   = $fileName.'_'.time().'.'.$extension;
            $request->file('file')->move(public_path('images'), $fileName);
            $url = asset('images/'.$fileName);
            return json_encode(['link' => $url]);
        }
    }
}
