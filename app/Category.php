<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Laravel\Passport\HasApiTokens;

class Category extends Model
{
    // use HasApiTokens;

    protected $fillable = ['name'];
    protected $table = 'categories';
}
