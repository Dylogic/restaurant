<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function getAll(){
        $menus = DB::table("menu_items")->get();
        return $menus;
    }

    public function getByPrice($min,$max)
    {
        # $menus = DB::select("select * from menu_items where price between ? and ? order by price asc", [$min, $max]);

        $menus = DB::table("menu_items")
            ->whereBetween("price", [$min,$max])
            ->orderBy("price","asc")
            ->get();

        return $menus;
    }
}
