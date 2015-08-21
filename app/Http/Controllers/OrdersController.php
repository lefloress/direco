<?php namespace Direco\Http\Controllers;

use Direco\Base\Controller;

class OrdersController extends Controller {

    public function index()
    {
        return view('orders.index');
    }

} 