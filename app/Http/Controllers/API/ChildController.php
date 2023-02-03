<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Suspectchild1;
use App\Http\Controllers\Controller;
use App\Models\suspectinformation;
use Illuminate\Support\Facades\Validator;

class ChildController extends Controller
{
    //
    public function childstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'child1_name' => 'required',
            'child1_address' => 'required',
            'child1_phone'=>'required',
            'child1_birth'=>'required'

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
            Suspectchild1::create([
                'child1_name' => $request->child1_name,
                'child1_address' => $request->child1_address,
                'child1_birth' => $request->child1_birth,
                'child1_phone' => $request->child1_phone,
                'martic_number' => $request->martic_number,
            ]);

            return response()->json([
                'status' => 200,
                'message' => 'Register Done'
            ]);
        }
    }


    public function index(){
        return response()->json([
            'all'=>Suspectchild1::all()
        ]);
    }



    public function updateinfo( $martic_number)
    {
        $results = suspectinformation::
        // where('id', $id)->
        where('martic_number',$martic_number )->get();
        return [
            'status' => 200,
            'suspect' => $results
        ];
    }
    public function childindex($martic_number){
        // $users = DB::table('suspectinfomations')
        // ->join('suspectchild1s', 'suspectinfomations.id', '=', 'suspectchild1s'.$martic_number)
        // ->get();
        $results = Suspectchild1::where('martic_number','=',$martic_number)->get();
        return[
            'status' => 200,
            'child'=>$results
        ];
    }

}
