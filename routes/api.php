<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ChildController;
use App\Http\Controllers\API\FormApiController;
use App\Http\Controllers\API\Fringerprint;
use App\Http\Controllers\API\MoreController;
use App\Http\Controllers\API\NoteController;
use App\Http\Controllers\API\OfficerController;
use App\Http\Controllers\API\SuspectManySurety;
use App\Http\Controllers\MainFringer;
use App\Http\Controllers\TotalController;
use Fringerprint as GlobalFringerprint;
use Illuminate\Support\Facades\Redis;


// Totals suspect , surety, officer
Route::get('/totalsuspect', [TotalController::class,'totalsuspect']);
Route::get('/totalsurety', [TotalController::class,'totalsurety']);
Route::get('/totalofficer', [TotalController::class,'totalofficer']);
// ..................................................................

//public routes 
Route::get('/fringerprint', [MainFringer::class, 'fringerprint']);
Route::get('/print/{fringer}', [MainFringer::class, 'try']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// end here 


Route::middleware('auth:sanctum', 'isAPIAdmin')->group(function () {
    Route::get('/checkingAuthenticated', function () {
        return response()->json(['message' => 'Your are in ', 'status' => 200], 200);
    });
    Route::get('/moreinfoad/{id}/{martic_number}', [MoreController::class, 'more_info']);
    //end here 
    // childern stuff start here 
    Route::get('/suspectchildad', [ChildController::class, 'index']);
    Route::post('/suspectchildad', [ChildController::class, 'childstore']);
    Route::get('/edit-suspectad/{martic_number}', [ChildController::class, 'updateinfo']);
    Route::get('/suspectchildad/{martic_number}', [ChildController::class, 'childindex']);
    // ends here 
    // suspect having many surety 
    Route::post('/suretyad', [FormApiController::class, 'suretystores']);
    Route::get('/edit-suspect-suretyad/{id}', [SuspectManySurety::class, 'suspectsurety']);
    Route::get('/suspect-many-suretyad/{martic_number}', [SuspectManySurety::class, 'suspectmanysurety']);
    // end 
    //note stuff 
    Route::get('/notead/{id}', [NoteController::class, 'notetaking']);
    Route::get('/getnotead/{id}', [NoteController::class, 'getnotetaking']);
    Route::put('/noteformad/{id}', [NoteController::class, 'noteform']);
    // suspect form 
    // Route::post('/suspect', [FormApiController::class, 'storesuspect']);
    Route::get('/suspectsad',  [FormApiController::class, 'indexsusupect']);

    Route::get('/add-suspect-officerad/{id}', [OfficerController::class, 'suspectsurety']);
    Route::get('/officervaluead/{martic_number}', [OfficerController::class, 'value']);
    
});



//IPO
Route::middleware('auth:sanctum', 'IPO')->group(function () {
    Route::get('/checking', function () {
        return response()->json(['message' => 'Your are in ', 'status' => 200], 200);
    });
    // more info 
    Route::get('/moreinfoipo/{id}/{martic_number}', [MoreController::class, 'more_info']);

    //end here 
    // officer
    //   Route::get('/officers', [OfficerController::class, 'officeindex']);
    Route::put('/officeripo/{id}', [OfficerController::class, 'officerrf']);

    Route::get('/officervalue/{martic_number}', [OfficerController::class, 'value']);
    // Route::get('/officervalue/{id}', [OfficerController::class, 'value']);

    Route::get('/add-suspect-officeripo/{id}', [OfficerController::class, 'suspectsurety']);
    
    Route::get('/check-suspect-officeripo/{martic_number}', [OfficerController::class, 'suspectmanyofficer']);

    Route::get('/suspecting',  [FormApiController::class, 'indexsusupect']);
    // suspect having many surety 
    Route::get('/edit-suspect-suretyipo/{id}', [SuspectManySurety::class, 'suspectsurety']);
    Route::get('/suspect-many-suretyipo/{martic_number}', [SuspectManySurety::class, 'suspectmanysurety']);
    // end 

    //note stuff 
    Route::get('/noteipo/{id}', [NoteController::class, 'notetaking']);
    Route::get('/getnoteipo/{id}', [NoteController::class, 'getnotetaking']);
    Route::put('/noteformipo/{id}', [NoteController::class, 'noteform']);

    // Route::post('/logout', [AuthController::class, 'logout']);
});


//OC
Route::middleware('auth:sanctum', 'OC')->group(function () {
    Route::get('/checkingoc', function () {
        return response()->json(['message' => 'Your are in ', 'status' => 200], 200);
    });
    // more info 
    Route::get('/moreinfooc/{id}/{martic_number}', [MoreController::class, 'more_info']);

    //end here 
    // officer
    //   Route::get('/officers', [OfficerController::class, 'officeindex']);
    Route::put('/officeroc/{id}', [OfficerController::class, 'officeroc']);

    Route::get('/officervalueoc/{martic_number}', [OfficerController::class, 'value']);
    // Route::get('/officervalue/{id}', [OfficerController::class, 'value']);

    Route::get('/add-suspect-officeroc/{id}', [OfficerController::class, 'suspectsurety']);
    
    Route::get('/check-suspect-officeroc/{martic_number}', [OfficerController::class, 'suspectmanyofficer']);

    Route::get('/suspectoc',  [FormApiController::class, 'indexsusupect']);
    // suspect having many surety 
    Route::get('/edit-suspect-suretyoc/{id}', [SuspectManySurety::class, 'suspectsurety']);
    Route::get('/suspect-many-suretyoc/{martic_number}', [SuspectManySurety::class, 'suspectmanysurety']);
    // end 

    //note stuff 
    Route::get('/noteoc/{id}', [NoteController::class, 'notetaking']);
    Route::get('/getnoteoc/{id}', [NoteController::class, 'getnotetaking']);
    Route::put('/noteformoc/{id}', [NoteController::class, 'noteform']);
});

// public route  for front desk officer only..................
Route::post('/suspect', [FormApiController::class, 'storesuspect']);
Route::post('/surety', [FormApiController::class, 'suretystores']);
// FRONT-OFFICER
Route::middleware('auth:sanctum', 'FD')->group(function () {
    Route::get('/checkingfd', function () {
        return response()->json(['message' => 'Your are in ', 'status' => 200], 200);
    });

    // fringerprint section   
    // Route::get('/fringerprint', [Fringerprint::class,'fringerprint']);
    // more info 
    Route::get('/moreinfofd/{id}/{martic_number}', [MoreController::class, 'more_info']);
    //end here 
    // childern stuff start here 
    Route::get('/suspectchild', [ChildController::class, 'index']);
    Route::post('/suspectchild', [ChildController::class, 'childstore']);
    Route::get('/edit-suspect/{martic_number}', [ChildController::class, 'updateinfo']);
    Route::get('/suspectchild/{martic_number}', [ChildController::class, 'childindex']);
    // ends here 
    // suspect having many surety 
    // Route::post('/surety', [FormApiController::class, 'suretystores']);
    Route::get('/edit-suspect-surety/{id}', [SuspectManySurety::class, 'suspectsurety']);
    Route::get('/suspect-many-suretyfd/{martic_number}', [SuspectManySurety::class, 'suspectmanysurety']);
    // end 
    //note stuff 
    Route::get('/notefd/{id}', [NoteController::class, 'notetaking']);
    Route::get('/getnotefd/{id}', [NoteController::class, 'getnotetaking']);
    Route::put('/noteformfd/{id}', [NoteController::class, 'noteform']);
    // suspect form 
    // Route::post('/suspect', [FormApiController::class, 'storesuspect']);
    Route::get('/suspects',  [FormApiController::class, 'indexsusupect']);
    // suspect form end
    Route::post('/logout', [AuthController::class, 'logout']);
});


//FRONT-RF------------------------
Route::middleware('auth:sanctum', 'RF')->group(function () {
    Route::get('/checkingrf', function () {
        return response()->json(['message' => 'Your are in ', 'status' => 200], 200);
    });

    //note stuff 
    Route::get('/note/{id}', [NoteController::class, 'notetaking']);
    Route::get('/getnote/{id}', [NoteController::class, 'getnotetaking']);
    Route::put('/noteform/{id}', [NoteController::class, 'noteform']);
    // officer
    Route::get('/officers', [OfficerController::class, 'officeindex']);
    Route::post('/officers', [OfficerController::class, 'officerspost']);

    Route::get('/add-suspect-officerrf/{id}', [OfficerController::class, 'suspectsurety']);
    Route::get('/check-suspect-officer/{martic_number}', [OfficerController::class, 'suspectmanyofficer']);
    // end
    // end here
    // more info 
    Route::get('/moreinfo/{id}/{martic_number}', [MoreController::class, 'more_info']);
    Route::get('/suspect-many-surety/{martic_number}', [SuspectManySurety::class, 'suspectmanysurety']);
    //end here 

    // suspect form 
    Route::get('/suspect',  [FormApiController::class, 'indexsusupect']);
    // suspect form end
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});









