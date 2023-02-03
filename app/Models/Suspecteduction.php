<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspecteduction extends Model
{
    use HasFactory;
    protected $fillable = [
 
        'tertiary_i',
        's_year_of_entry',
        'p_year',
        'p_year_g',
        'primary',
        'tertiary_y',
        'tertiary_y_g',
        'secondary',
        's_year_of_gradution'
    ];
}
