<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "products";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['name', 'price', 'categoryId', 'stock'];

    public function category(){
        $this->belongsTo(Categories::class, 'categoryId', 'id');
    }
}
