<?php

namespace App\Http\Controllers\API;

use App\Models\image;
use App\Models\Suretyextra;
use Illuminate\Support\Str;
use App\Models\Suretyhereby;
use App\Models\Suretyimages;
use App\Models\Suretyorgins;
use App\Models\Suspectimage;
use App\Models\Suspectorgin;
use Illuminate\Http\Request;
use App\Models\Policeofficer;
use App\Models\Suspectchild1;
use App\Models\Suspectchild2;
use App\Models\SuspectFather;
use App\Models\Suspecthereby;
use App\Models\SuspectMother;
use App\Models\SuspectSpouse;
use App\Models\Suretyeducation;
use App\Models\Suspecteduction;
use App\Models\SuspectLandlord;
use App\Models\SuspectSibling1;
use App\Models\SuspectSibling2;
use App\Models\Suretyempolyment;
use App\Models\Suretyinfomations;
use App\Models\Suspectempolyment;
use  Illuminate\Http\UploadedFile;
use App\Models\suspectinformation;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\File;

class FormApiController extends Controller
{
    public function storesuspect(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'affix_front' => 'required',
            // 'affix_left' => 'required',
            // 'affix_right' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'mobile_phone' => 'required|unique:suspectinformations',
            'office_phone' => 'required|unique:suspectinformations',
            'note' => 'required',
            'spouse_name' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'father_res_address' => 'required',
            'mother_res_address' => 'required',
            'Landlord_name' => 'required',
            'Landlord_phone' => 'required',
            'Landlord_address' => 'required',
            'hereby_name' => 'required',
            'hereby_signature' => 'required',
            'Sibling1_name' => 'required',
            'Sibling2_name' => 'required',
            'last_place' => 'required',
            'address_employer' => 'required',
            'Penultimate_Place' => 'required',
            'address_of_penultimate' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {


            $suspectLandlord = SuspectLandlord::create([
                'Landlord_name' => $request->Landlord_name,
                'Landlord_address' => $request->Landlord_address,
                'Landlord_phone' => $request->Landlord_phone,
            ]);
            $suspectHere = Suspecthereby::create([
                'hereby_name' => $request->hereby_name,
                'hereby_signature' => $request->hereby_signature,
            ]);

            $suspectSibling1 = SuspectSibling1::create([
                'Sibling1_name' => $request->Sibling1_name,
                'Sibling1_birth' => $request->Sibling1_birth,
                'Sibling1_phone' => $request->Sibling1_phone,
                'Sibling1_res_address' => $request->Sibling1_res_address,
            ]);
            $suspectSibling2 = SuspectSibling2::create([
                'Sibling2_name' => $request->Sibling2_name,
                'Sibling2_birth' => $request->Sibling2_birth,
                'Sibling2_phone' => $request->Sibling2_phone,
                'Sibling2_res_address' => $request->Sibling2_res_address,
            ]);
            $suspectMother = SuspectMother::create([
                'mother_name' => $request->mother_name,
                'mother_birth' => $request->mother_birth,
                'mother_phone' => $request->mother_phone,
                'mother_res_address' => $request->mother_res_address,
            ]);
            SuspectFather::create([
                'father_name' => $request->father_name,
                'father_birth' => $request->father_birth,
                'father_phone' => $request->father_phone,
                'father_res_address' => $request->father_res_address,
            ]);
            $suspectSpouse =   SuspectSpouse::create([
                'spouse_name' => $request->spouse_name,
                'spouse_maiden' => $request->spouse_maiden,
                'spouse_date_brith' => $request->spouse_date_brith,
                'spouse_residential_address' => $request->spouse_residential_address,
                'spouse_phone' => $request->spouse_phone,
                'spouse_work' => $request->spouse_work
            ]);
            Suspecteduction::create([
                'tertiary_i' => $request->tertiary_i,
                'tertiary_y' => $request->tertiary_y,
                'tertiary_yg' => $request->tertiary_y_g,
                'secondary' => $request->secondary,
                's_year_of_entry' => $request->s_year_of_entry,
                's_year_of_gradution' => $request->s_year_of_gradution,
                // i just changed something here 
                'p_year' => $request->primary_year,
                'p_year_g' => $request->p_year_g,
                'primary' => $request->primary
            ]);
            Suspectorgin::create([
                'nationality' => $request->nationality,
                'state' => $request->state,
                // 'ethnic_group' => $request->ethnic_group,
                // 'local-govt' => $request->local_govt,
                // 'town_village' => $request->town_village
            ]);
            Suspectempolyment::create([
                'last_place' => $request->last_place,
                'address_employer' => $request->address_employer,
                'Penultimate_Place' => $request->Penultimate_Place,
                'address_of_penultimate' => $request->address_of_penultimate
            ]);
            $img = $request->affix_left;
            $folderPath = "public/uploads/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("data:image/png", $image_parts[0]);
            $image_type = $image_type_aux[1] ;
            $image_base64 = base64_decode($image_parts[1], true);
            $fileName =  uniqid().'.png';
            $file= $folderPath.$fileName;
            Storage::put($file, $image_base64);
            suspectinformation::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'middlename' => $request->middlename,
                'affix_left' => $fileName,
                // $image_new,
                // // // 'affix_left'=>$request->file('affix_left')->store('image', 'public')
                // 'affix_right' => $image_new_r,
                // 'affix_front' => $image_new_f,
                'martic_number' => $request->martic_number,
                'gender' => $request->gender,
                'date_birth' => $request->date_birth,
                'place_birth' => $request->place_birth,
                'mobile_phone' => $request->mobile_phone,
                'office_phone' => $request->office_phone,
                'email' => $request->email,
                'langugaes' => $request->langugaes,
                'residental_address' => $request->residental_address,
                'international_passport' => $request->international_passport,
                'office_shop' => $request->office_shop,
                'note' => $request->note,
                'fringer' => $request->fringer
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Register Done'
            ]);
        }
    }


    public function indexsusupect()
    {
        // return Suspectinfomation::all();
        // $results = Suspectinfomation::paginate(1);;
        
        return response()->json([
            'status' => 200,
            'data' => suspectinformation::latest()->get()
            // 'data'=>$results
        ]);
    }

    // surety
    public function suretystores(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|unique:suretyinfomations',
            'lastname' => 'required|unique:suretyinfomations',
            'middlename' => 'required|unique:suretyinfomations',
            'mobile_phone' => 'required|unique:suretyinfomations',
            'office_phone' => 'required|unique:suretyinfomations',
            'international_passport' => 'required||unique:suretyinfomations',
            'date_birth' => 'required',
            'residental_address' => 'required|unique:suretyinfomations',
            'office_shop' => 'required|unique:suretyinfomations',
            // 'last_place' => 'required|unique:suretyempolyments',
            // 'Penultimate_Place' => 'required|unique:suretyempolyments'
            'time_known' => 'required',
            'crime' => 'required',
            'prior_case' => 'required',
            'prior_surety' => 'required',
            'suspect_name' => 'required',
            'date_signature' => 'required',
            'relationship' => 'required',
            // 'affix_front'=>'required|mimes:jpg,jpeg,png,svg|max:5048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages(),
            ]);
        } else {

            $img = $request->affix_left;
            $folderPath = "public/uploads/";
            $image_parts = explode(";base64,", $img);
            $image_type_aux = explode("data:image/jpeg", $image_parts[0]);
            $image_type = $image_type_aux[1] ;
            $image_base64 = base64_decode($image_parts[1], true);
            $fileName =  uniqid().'.png';
            $file= $folderPath.$fileName;
            Storage::put($file, $image_base64);


            $suretynewdata = new Suretyinfomations;
            // $suretynewdata->firstname = $request->firstname;
            $suretynewdata->affix_left = $fileName;   
            $suretynewdata->lastname = $request->lastname;
            $suretynewdata->middlename = $request->middlename;
            $suretynewdata->gender = $request->gender;
            $suretynewdata->date_birth = $request->date_birth;
            $suretynewdata->place_birth = $request->place_birth;
            $suretynewdata->mobile_phone = $request->mobile_phone;
            $suretynewdata->office_phone = $request->office_phone;
            $suretynewdata->email = $request->email;
            $suretynewdata->langugaes = $request->langugaes;
            $suretynewdata->residental_address = $request->residental_address;
            $suretynewdata->international_passport = $request->international_passport;
            $suretynewdata->office_shop = $request->office_shop;
            $suretynewdata->martic_number = $request->martic_number;
            $suretynewdata->firstname = $request->firstname;



            // $suretymaking->name = $request->input('name');
            // $sure
            // if ($request->hasfile('affix_front')) {
            //     $store_ext_front  =  $request->file('affix_front')->extension();
            //     $new_im age_front = time() . "." . $store_ext_front;
            //     $request->file('affix_front')->move(public_path('affix_front'), $new_image_front);
            // }
            $surety = Suretyextra::create([
                'relationship' => $request->relationship,
                'crime' => $request->crime,
                'penalty' => $request->penalty,
                'time_known' => $request->time_known,
                'surety_requirement' => $request->surety_requirement,
                // 'p_year'=>$request->p_year,
                'prior_case' => $request->prior_case,
                'prior_surety' => $request->prior_surety,
                'suspect_name' => $request->suspect_name,
                'date_signature' => $request->date_signature,
                'martic_number' => $request->martic_number
            ]);
            $suspectempolyment =  Suretyempolyment::create([
                'last_place' => $request->last_place,
                'address_employer' => $request->address_employer,
                'Penultimate_Place' => $request->Penultimate_Place,
                'address_of_empolyer' => $request->address_of_empolyer,
                'martic_number' => $request->martic_number
            ]);
            $suspectorgin =  Suretyorgins::create([
                'nationality' => $request->nationality,
                'state' => $request->state,
                'ethnic_group' => $request->ethnic_group,
                'local_govt' => $request->local_govt,
                'town_village' => $request->town_village,
                'martic_number' => $request->martic_number
            ]);
            $suspectHere = Suretyhereby::create([
                'hereby_name' => $request->suspect_name,
                'hereby_signature' => $request->date_signature,
                'martic_number' => $request->martic_number
            ]);
            $eduction = new  Suretyeducation;
            $eduction->tertiary_i = $request->input('tertiary_i');
            $eduction->tertiary_y = $request->input('tertiary_y');
            $eduction->tertiary_yg = $request->input('tertiary_yg');
            $eduction->secondary = $request->input('secondary');
            $eduction->s_year_of_entry = $request->input('s_year_of_entry');
            $eduction->s_year_of_gradution = $request->input('s_year_of_gradution');
            $eduction->p_year = $request->input('p_year');
            $eduction->martic_number = $request->input('martic_number');
            $eduction->p_year_g = $request->input('p_year_g');
            $eduction->primary = $request->input('primary');
            $eduction->save();
            $suretynewdata->save();

            // $suretynewdata->save();
            return response()->json([
                'status' => 200,

                // 'username' => $suspectinformation->name,
                'message' => 'Register Done',
                'insert' => $suretynewdata->affix_front
            ]);
        }
    }
}




















// $suretyinfo =   Suretyinfomations::create([
//     'firstname' => $request->firstname,
//     'lastname' => $request->lastname,
//     'middlename' => $request->middlename,
   
//     'affix_left' => $image_new,
//     'affix_right' => $image_new_r,
//     'affix_front' => $image_new_f,

//     'gender' => $request->gender,
//     'date_birth' => $request->date_birth,
//     'place_birth' => $request->place_birth,
//     'mobile_phone' => $request->mobile_phone,
//     'office_phone' => $request->office_phone,
//     'email' => $request->email,
//     'langugaes' => $request->langugaes,
//     'residental_address' => $request->residental_address,
//     'international_passport' => $request->international_passport,
//     'office_shop' => $request->office_shop,
//     'martic_number' => $request->martic_number
// ]);



   // $suspectinformation = new  suspectinformation;
            // $suspectinformation->name = $request->input('name');
            // $suspectinformation->gender = $request->input('gender');
            // $suspectinformation->date_birth = $request->input('date_birth');
            // $suspectinformation->place_birth =  $request->input('place_birth');
            // $suspectinformation->mobile_phone= $request->input('mobile_phone');
            // $suspectinformation->office_phone = $request->input('office_phone');
            // $suspectinformation->email = $request->input('email');
            // $suspectinformation->langugaes = $request->input('langugaes');
            // $suspectinformation->residental_address = $request->input('residental_address');
            // $suspectinformation->international_passport = $request->input('international_passport');
            // $suspectinformation->office_shop = $request->input('office_shop');
            // $suspectinformation->note=$request->input('note');
            // $suspectinformation->martic_number = $request->input('martic_number');
            // if ($request->hasFile('affix_front')) {
            //     $affix_front =  $request->file('affix_front');
            //     $extension_f = $affix_front->getClientOriginalExtension();
            //     $image_new_f = time() . "." .  $extension_f;
            //     // $affix_front->store('image', 'public');
            //     $affix_front->move('uploads/images/', $image_new_f);
            //     $suspectinformation->affix_front =  'uploads/images/'.$image_new_f;
            // }

            // $suspectinformation->save();
            //  bro i was testing above this line .. when the images was not workingbe carefull


            // if ($request->hasFile('affix_left')) {
            //     $affix_left =  $request->file('affix_left');
            //     $extension = $affix_left->getClientOriginalExtension();
            //     $image_new = time() . "."  . $extension;
            //     // $affix_left->store('image', 'public');
            //     $affix_left->move('uploads/images/', $image_new);
            // }
            // if ($request->hasFile('affix_right')) {
            //     $affix_right =  $request->file('affix_right');
            //     $extension_r = $affix_right->getClientOriginalExtension();
            //     $image_new_r = time() . "." . $extension_r;
            //     // $affix_right->store('image', 'public');
            //     $affix_right->move('uploads/images/', $image_new_r);
            // }