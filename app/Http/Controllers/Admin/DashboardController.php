<?php namespace Direco\Http\Controllers\Admin;

class DashboardController extends AdminController {

    public function index()
    {
        return view('admin.dashboard.index');
    }

} 