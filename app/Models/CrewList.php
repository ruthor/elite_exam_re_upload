<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewList extends Model
{
    use HasFactory;

    protected $table = "crew_profiles";

     
    protected $fillable = [
       'first_name',
       'middle_name',
       'last_name',
       'email',
       'address',
       'birthdate',
       'age',
       'rank',
       'weight',
       'height'
    ];
}
