<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imi;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    public function getImi(Request $request, $id){
    	$imi = Imi::where(["user_id" => $id])->first();
    	return response()->json(["answers" => $imi]);
    }

    public function storeImi(Request $request, $id){
    	if(!$imi = Imi::where(["id" => $id])->first()){
    		$imi = new Imi;
    		$imi->user_id = $request->user;
    	}
    	$imi->p1 = $request->p1;
    	$imi->p2 = $request->p2;
    	$imi->p3 = $request->p3;
    	$imi->p4 = $request->p4;
    	$imi->p5 = $request->p5;
    	$imi->p6 = $request->p6;
    	$imi->p7 = $request->p7;
    	$imi->p8 = $request->p8;
    	$imi->p9 = $request->p9;
    	$imi->p10 = $request->p10;
    	$imi->p11 = $request->p11;
    	$imi->p12 = $request->p12;
    	$imi->p13 = $request->p13;
    	$imi->p14 = $request->p14;
    	$imi->p15 = $request->p15;
    	$imi->p16 = $request->p16;
    	$imi->p17 = $request->p17;
    	$imi->p18 = $request->p18;
    	$imi->p19 = $request->p19;
    	$imi->p20 = $request->p20;
    	$imi->save();
    }
}
