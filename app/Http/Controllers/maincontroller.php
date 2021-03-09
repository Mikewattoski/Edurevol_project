<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\links;

class maincontroller extends Controller
{
    function add (Request $request) {
        
    $request->validate([
            'section'=>'required',
            'cource_id'=>'required',
            'url' => ['required', 'regex:/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/'],

        ]);
        // in validate the user has to fill sector and cource id and url must be in youtube formate
        $url = $request->url;
if (preg_match('/youtube\.com\/watch\?v=([^\&\?\/]+)/', $url, $videoId)) {
$values = $videoId[1];
} else if (preg_match('/youtube\.com\/embed\/([^\&\?\/]+)/', $url, $videoId)) {
$values = $videoId[1];
} else if (preg_match('/youtube\.com\/v\/([^\&\?\/]+)/', $url, $videoId)) {
$values = $videoId[1];
} else if (preg_match('/youtu\.be\/([^\&\?\/]+)/', $url, $videoId)) {
$values = $videoId[1];
}
else if (preg_match('/youtube\.com\/verify_age\?next_url=\/watch%3Fv%3D([^\&\?\/]+)/', $url, $id)) {
$values = $videoId[1];
} else {   
$values="not found";
}
// $values contain id of the video which is sore in database which is easy to use as compare to full link of youtube
        $link=new links;
        $link->section=$request->section;
        $link->cource=$request->cource_id;
        $link->url=$values;
        $link->save();
        return back();
    }
    function filter(Request $request){
        $request->validate([
            'section'=>'required',
            'cource_id'=>'required',
        ]);
        $links=links::all()->where('section',$request->section)->where('cource',$request->cource_id);
//simple laravel query to filter the thumblines
        return view('edurevol',['links'=>$links]);
    }
}
