<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policeofficer extends Model
{
    use HasFactory;
    // protected $guarded=[];
    protected $fillable  = [
        'height_of_suspect',
        'martic_number',
        'suspect_name',
        'weight_of_suspect',
        'distinguinshing_features',
        'nature_of_crime',
        'accomplices',
        'number_of_offense',
        'motive',
        'financial_benefits',
        'environment_commited',
        'enfd',
        'cr',
        'reg_officer_name',
        'reg_signature_date',
        'officer_name',
        'officer_signature_date',
        'oc_name',
        'oc_signature_date'
    ];
}
