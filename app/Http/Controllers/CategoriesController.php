<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function all()
    {
        return Categories::all();
    }

    public function store(Request $req){
        $info = new Categories();
        if($req->option != 1){
            $info = $info->find($req->id);
        }
        $info->name = $req->name;
        $info->description = $req->description;
        $info->save();
        return response()->json(['successfully saved/updated'], 201);
    }

    public function remove(Request $req){
        try{
            $info = Categories::find($req->id, ['id']);
            $info->delete();
        }catch(QueryException $e){
            throw new \Error('La categoria tiene registros relacionados');
        }
        return response()->json(['successfully removed'], 201);
    }
}
