<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{

	function index(){
		
    	return view('admin.dashboard');
	}

	function loginSubmit(){

	}
}