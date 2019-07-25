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
    public function show_first(Request $request){
    	Alert::success("Selamat Datang");
    	$hari_ini = Carbon::now();
    	return view('contents.index', ['hari_ini' => $hari_ini]);
    }
}
