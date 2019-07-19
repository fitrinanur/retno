<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = 
    [
        'name',           
        'no_member',
        'birthday',       
        'phone_number',   
        'email',  
        'address'
    ];
}
