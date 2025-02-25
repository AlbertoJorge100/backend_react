<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "categories";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['name', 'description'];
}
