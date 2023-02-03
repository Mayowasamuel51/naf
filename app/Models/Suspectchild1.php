<?php

namespace App\Models;

use App\Models\Suspectinfomation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suspectchild1 extends Model
{
    use HasFactory;
    // protected $guarded=[];
    protected $fillable=[
        'child_id',
        'child1_name',
        'child1_address' ,
        'child1_birth' ,
        'child1_phone' ,
        'child1_res_address',
        'martic_number'
    ];

    
    // protected $with= ['user'];
    // public function user(){
    //     return $this->belongsTo(Suspectinfomation::class,'child_id', 'martic_number');
    // }
}
