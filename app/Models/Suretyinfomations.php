<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suretyinfomations extends Model
{
    use HasFactory;
    // protected $guarded=[];
    protected $fillable = [
        'name' ,
        'gender',
        'date_birth',
        'place_birth',
        'mobile_phone',
        'affix_left',
        'office_phone',
        'email',
        'langugaes',
        'affix_front',
        'affix_right',
        'residental_address',
        'international_passport',
        'office_shop',
        'martic_number',
        'firstname' ,
        'lastname',
        'middlename',
    ];
}
