<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function getMenusByOrderId($orderId){
        $menus = DB::table("order_details")
        ->join("menu_items","menu_item_id","=","item_id")
        ->select("item_name", "category", "price")
        ->where("order_id", $orderId)
        ->get();
        return $menus;
    }
    function getOrdersByDate($date){
        $order = DB::table("order_details")
        ->join("menu_items","menu_item_id","=","item_id")
        ->where("order_date", $date)
        ->orderBy("order_time","desc")
        ->get();
        return $order;
    }
    function getTotalOrdersByDate($date){

        $total = DB::table("order_details")
        ->join("menu_items","menu_item_id","=","item_id")
        ->select(DB::raw("sum(price) as total"))
        ->where("order_date", $date)
        ->get();
        return $total;
    }
}
