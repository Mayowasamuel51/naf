<?php

// namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\suspectinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Fringerprint extends Controller{
    public function try($fringer){
        $try = DB::table('suspectinformations')->where('fringer', $fringer)->first();
      if($try){
        return response()->json([
            'status'=>200,
            'value'=>DB::table('suspectinformations')->where('fringer', $fringer)->first()
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
        // $suspectinformation = DB::select('select  fringer from suspectinformations');
    //    $get_all =  
        // $store_fringer =  $get_all->fringer;
        // $suspectinformation = suspectinformation::where('fringer', $store_fringer)->get();

        return response()->json([
            'miain'=>suspectinformation::find(1)
        ]);
        // ->first();
        // if($get_all){
           
        //     return response()->json([
        //         'status'=>200,
        //         'value'=>$suspectinformation,
        //         // 'data'=>  suspectinformation::find()
        //     ]);
   
        // }else{
        //     return response()->json([
        //         'status'=>404,
        //         'error'=>'SUSPECT DOES NOT EXIST IN THE SYSTEM'
        //     ]);
   
        // }

    }
}
