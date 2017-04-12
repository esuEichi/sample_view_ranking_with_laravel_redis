<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LinkController extends Controller
{
    //
    function index(Request $request){
    	$id = $request->id;
    	$ranking = new RankingModule;
    	$ranking->increment_view_ranking($id);
    	return view('link')->with(compact('id'));
    }
}
