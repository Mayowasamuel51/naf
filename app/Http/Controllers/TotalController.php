<?php

namespace App\Http\Controllers;

use App\Models\Policeofficer;
use App\Models\Suretyinfomations;
use App\Models\suspectinformation;
use Illuminate\Http\Request;

class TotalController extends Controller
{
    //
    public function totalsuspect(){
        $total = suspectinformation::count();
        return response()->json([
            'status' => 200,
            'total' => $total
        ]);
    }

    public function totalsurety()  {
        $total = Suretyinfomations::count();
        return response()->json([
            'status' => 200,
            'total' => $total
        ]);
    }

    public function totalofficer()
    {
        $total = Policeofficer::count();
        return  response()->json([
            'status' => 200,
            'total' => $total
        ]);
    }
}
