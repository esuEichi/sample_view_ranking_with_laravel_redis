<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redis;


class RankingModule extends Controller
{
    //
    public function increment_view_ranking($id){
        $key = "ranking-"."id:".$id;

        $value = Redis::get($key);
        if(empty($value)){
            Redis::set($key, "1");
        } else {
            Redis::set($key,$value + 1);
        }
        echo "view count:".Redis::get($key);
    }
	public function get_ranking_all(){
        $keys = Redis::keys('ranking-*');
        $results = Array();
        
        if(empty($keys) != true){
            for($i=0; $i < sizeof($keys); $i++){
                $point = Redis::get($keys[$i]);
                $id = explode(':', $keys[$i])[1];
                $results[$id] = $point;
            }
            arsort($results, SORT_NUMERIC);
        }
        return $results;
    }
}
