<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\suspectinformation;
use Illuminate\Support\Facades\DB;

class MainFringer extends Controller
{
    //
    public function try($fringer){
        $try = DB::table('suspectinformations')->where('lastname', $fringer)->get();
      if($try){
        return response()->json([
            'status'=>200,
            'value'=>$try
        ]);
      }else{
        return response()->json([
            'status'=>404,
            'error'=>'NOT FOUND'
        ]);
      }
    }

    public function fringerprint(){
        // loop 
        $suspectinformation = suspectinformation::all();       
        if($suspectinformation){
            return response()->json([
                'status'=>200,
                'value'=>$suspectinformation,
                // 'data'=>  suspectinformation::find()
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'error'=>'SUSPECT DOES NOT EXIST IN THE SYSTEM'
            ]);
   
        }

    }
}
