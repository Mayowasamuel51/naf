<?php

namespace App\Models;

use App\Models\Suspectinfomation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuspectSpouse extends Model
{
    use HasFactory;
    // protected $guarded=[];
    protected $fillable=[
        'spouse_name',
        'spouse_maiden',
        'spouse_date_brith',
        'spouse_residential_address',
        'spouse_phone',
        'spouse_work'
    ];
    // public function suspectinfomation()
    // {
    //     return $this->belongsTo(Suspectinfomation::class);
    // }
}
