<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Alert;
use Session;
use Validator;
use Redirect;
use Carbon\Carbon;

class ViewController extends Controller
{
    public function show_tes(Request $request){
    	Alert::success("Selamat Datang");
    	$hari_ini = Carbon::now();
    	return view('contents.tes', ['hari_ini' => $hari_ini]);
    }


	public function show_first(Request $request){
		Alert::success("Selamat Datang");
		return view('contents.index');
	}
}
