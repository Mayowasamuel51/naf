<?php

namespace App\Http\Controllers\API;

use App\Models\Suspectorgin;
use Illuminate\Http\Request;
use App\Models\Suspectchild1;
use App\Models\SuspectFather;
use App\Models\Suspecthereby;
use App\Models\SuspectMother;
use App\Models\SuspectSpouse;
use App\Models\Suspecteduction;
use App\Models\SuspectLandlord;
use App\Models\SuspectSibling1;
use App\Models\SuspectSibling2;
use App\Models\Suretyinfomations;
use App\Models\Suspectempolyment;
use App\Models\suspectinformation;
use App\Http\Controllers\Controller;
use App\Models\Suretyeducation;
use App\Models\Suretyempolyment;
use App\Models\Suretyextra;
use App\Models\Suretyhereby;
use App\Models\Suretyorgins;

class MoreController extends Controller
{
    //
    public function more_info($id, $martic_number) {
        // about to join things about the supect ..
        // $more_info = DB::table('suspectinformations')
        return response()->json([
            'suspect'=>suspectinformation::where('id','=', $id)->get(),
            'child'=>Suspectchild1::where('martic_number', '=', $martic_number)->get(),
            'mother' => SuspectMother::where('id',$id)->get(),
            'father' => SuspectFather::where('id',$id)->get(),
            'sibling1s' => SuspectSibling1::where('id',$id)->get(),
            'sibling2s' => SuspectSibling2::where('id',$id)->get(),
            'orgin' => Suspectorgin::where('id',$id)->get(),
            'landlord' => SuspectLandlord::where('id',$id)->get(),
            'spouse' => SuspectSpouse::where('id',$id)->get(),
            'hereby' => Suspecthereby::where('id',$id)->get(),
            'education' => Suspecteduction::where('id',$id)->get(),
            'empolyment' => Suspectempolyment::where('id',$id)->get(),

            // get thing about surety but martic numbers 
            'surety'=>Suretyinfomations::where('martic_number', '=', $martic_number)->get(),
            'surety'=>Suretyeducation::where('martic_number', '=', $martic_number)->get(),
            'surety'=>Suretyempolyment::where('martic_number', '=', $martic_number)->get(),
            'surety'=>Suretyextra::where('martic_number', '=', $martic_number)->get(),
            'surety'=>Suretyorgins::where('martic_number', '=', $martic_number)->get(),
            'surety'=>Suretyhereby::where('martic_number', '=', $martic_number)->get(),

        ]);
    }
}
