<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Category extends Model
{
    // use HasApiTokens;

    protected $fillable = ['name'];
    protected $table = 'categories';
    public function item()
    {
        return $this->hasMany(Item::class);
    }
}
