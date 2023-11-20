<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function getAll(){
        $categories = DB::table("menu_items")
        ->select("category")
        ->groupBy("category")
        ->get();
        return $categories;
    }
    function getMenusByCategory($name){
        $menus = DB::table("menu_items")
        ->where("category",$name)
        ->get();
        return $menus;
    }
}
