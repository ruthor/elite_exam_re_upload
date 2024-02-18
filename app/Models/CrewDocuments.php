<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewDocuments extends Model
{
    use HasFactory;

    protected $table = "crew_documents";

     
    protected $fillable = [
       'crewid',
       'documentid',
       'documentfile',
       'documenttype'
    ];
}
