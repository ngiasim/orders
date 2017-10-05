<?php

namespace Ngiasim\Orders;
 
use App\Http\Controllers\Controller;
 
class OrderController extends Controller
{
 
    public function index()
    {
        $text = "hello asad raza";
        return view('orders::index', compact('text'));
    }
 
}
