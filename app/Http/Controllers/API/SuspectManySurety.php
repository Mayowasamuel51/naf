<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Suretyinfomations;
use App\Models\suspectinformation;
use App\Http\Controllers\Controller;

class SuspectManySurety extends Controller
{
    
    public function suspectsurety($id) {
        $results =  suspectinformation::where('id', $id)->get();
        return [
            'status' => 200,
            'suspect' => $results
        ];
    }
    // suspect having mutiple surety funtions
    public function suspectmanysurety($martic_number) {
        $results = Suretyinfomations::where('martic_number', '=', $martic_number)->get();
        return [
            'status' => 200,
            'suspectmanysurety' => $results
        ];
    }

}
