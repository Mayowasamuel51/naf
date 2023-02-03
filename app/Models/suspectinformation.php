<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suspectinformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'gender',
        'date_birth',
        'place_birth',
        'mobile_phone',
        'affix_left',
        'affix_front',
        'affix_right',
        'office_phone',
        'email',
        'langugaes',
        'residental_address',
        'international_passport',
        'office_shop',
        'martic_number',
        'note',
        'fringer',
        'firstname',
        'lastname',
        'middlename'
    ];
    // public function scopeFilter($query, array $filters){
    //     if($filters['fringer'] ?? false){
    //         $query->where('fringer',.request('search').'%');
    //     }
    //     if($filters['search'] ?? false){
    //         $query->where('title','like','%'.request('search').'%')->orwhere('description','like', '%'.request('search').'%');
    //     }
        
    // }
}
