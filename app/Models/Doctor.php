<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guard = 'doctor';

    protected $fillable = ['name', 'email', 'password'];
}
