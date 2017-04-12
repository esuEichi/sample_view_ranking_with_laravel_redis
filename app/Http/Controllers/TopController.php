<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class TopController extends Controller
{
    //
    function index(Request $request){
    	$ranking = new RankingModule;
    	$results = $ranking->get_ranking_all();
    	return view('welcome')->with(compact('results'));
    }
}
