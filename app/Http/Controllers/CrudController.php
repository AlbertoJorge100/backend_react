<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function all()
    {
        return [
            'products' => Products::from('products as p')
                ->join('categories as c', 'p.categoryId', '=', 'c.id')
                ->get(['p.*', 'c.name as category']),
            'categories' => Categories::all()
        ];
    }

    public function store(Request $req){
        $info = new Products();
        if($req->option != 1){
            $info = $info->find($req->id);
        }
        $info->name = $req->name;
        $info->price = $req->price;
        $info->categoryId = $req->categoryId;
        $info->stock = $req->stock;
        $info->save();
        return response()->json(['successfully saved/updated'], 201);
    }

    public function remove(Request $req){
        $info = Products::find($req->id, ['id']);
        $info->delete();
        return response()->json(['successfully removed']);
    }
}
