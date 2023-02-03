<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Policeofficer;
use App\Http\Controllers\Controller;
use App\Models\suspectinformation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OfficerController extends Controller
{
    //


    // am changing something here    
    public function value($martic_number)
    {
        $pass_v = DB::table('policeofficers')->where('martic_number', $martic_number)->first();
        //  Policeofficer::where('martic_number', $martic_number)->get();
        return response()->json([
            'status' => 200,
            'data' => DB::table('policeofficers')->where('martic_number', $martic_number)->get()
        ]);
    }

    public function officeroc(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'oc_name' => 'required',
            // 'suspect_name'=>'required|unique:policeofficers',
            'oc_signature_date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
        $officer  = Policeofficer::findOrFail($id);
        if ($officer) {
            $officer->oc_name = $request->oc_name;
            $officer->oc_signature_date = $request->oc_signature_date;
    
            $officer->update();
            return response()->json([
                'status' => 200,
                'message' => 'Updated successfully'
            ]);
            // }
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Updated failed'
            ]);
        }
    }}




    public function officerrf(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'officer_name' => 'required',
            // 'suspect_name'=>'required|unique:policeofficers',
            'officer_signature_date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
        $officer  = Policeofficer::findOrFail($id);
        if ($officer) {
            $officer->officer_name = $request->officer_name;
            $officer->officer_signature_date = $request->officer_signature_date;
    
            $officer->update();
            return response()->json([
                'status' => 200,
                'message' => 'Updated successfully'
            ]);
            // }
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'Updated failed'
            ]);
        }
    }}







    public function suspectmanyofficer($martic_number)
    {
        $results = Policeofficer::where('martic_number', '=', $martic_number)->get();
        return [
            'status' => 200,
            'suspectmanyofficer' => $results
        ];
    }
    public function suspectsurety($id)
    {
        $results =  suspectinformation::where('id', $id)->get();
        return [
            'status' => 200,
            'suspect' => $results
        ];
    }
    public function officeindex()
    {
        return response()->json([
            'status' => 200,
            'data' => Policeofficer::all()
        ]);
    }


    public function officerspost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'suspect_name' => 'bail|required|unique:policeofficers',
            // 'martic_number'=>'required|unique:policeofficers',
            'height_of_suspect' => 'required',
            'weight_of_suspect' => 'required',
            'distinguinshing_features' => 'required',
            'nature_of_crime' => 'required',
            'reg_officer_name' => 'required',
            // 'oc_name' => 'required',
            // 'officer_name' => "required",
            'enfd' => "required",
            'environment_commited' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {
            Policeofficer::create([
                'suspect_name' => $request->suspect_name,
                'height_of_suspect' => $request->height_of_suspect,
                'weight_of_suspect' => $request->weight_of_suspect,
                'distinguinshing_features' => $request->distinguinshing_features,
                'nature_of_crime' => $request->nature_of_crime,
                'number_of_offense' => $request->number_of_offense,
                'accomplices' => $request->accomplices,
                'motive' => $request->motive,
                'financial_benefits' => $request->financial_benefits,
                'environment_commited' => $request->environment_commited,
                'enfd' => $request->enfd,
                'cr' => $request->cr,
                'reg_officer_name' => $request->reg_officer_name,
                'reg_signature_date' => $request->reg_signature_date,
                'officer_name' => $request->officer_name,
                'officer_signature_date' => $request->officer_signature_date,

                'oc_name' => $request->oc_name,
                'oc_signature_date' => $request->oc_signature_date,
                'martic_number' => $request->martic_number
            ]);
            return response()->json([
                'status' => 200,
                'officer_name' => $request->officer_name,
                'message' => 'Register Done for officer'
            ]);
        }
    }
}
