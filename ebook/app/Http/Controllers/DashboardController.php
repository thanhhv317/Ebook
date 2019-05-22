<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getList(){
    	return view('admin.dashboard.list');
    }
}
