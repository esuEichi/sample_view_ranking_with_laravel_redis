<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class linkController extends Controller
{
    //
    function index(Request $request){
    	$id = $request->id;
    	
    	return view('link')->with(compact('id'));
    }
}
