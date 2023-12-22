<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;


    protected $table='admins';
    protected $primaryKey="id";
    protected $fillable=['username','first_name','last_name','contact','gender','email'];
    protected $hidden=['password','remember_token','deleted_at'];

      protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}

