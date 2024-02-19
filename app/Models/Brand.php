<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{


    protected $table= 'masterchief';
    protected $fillable = [
        'name', 'designation', 'photo',
        // add other fields as needed
    ];


}
