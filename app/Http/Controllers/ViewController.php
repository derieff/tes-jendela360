<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Alert;
use Session;
use Validator;
use Redirect;
use Carbon\Carbon;
use DB;

class ViewController extends Controller
{
    public function show_tes(Request $request){
    	Alert::success("Selamat Datang");
    	$hari_ini = Carbon::now();
    	return view('contents.tes', ['hari_ini' => $hari_ini]);
    }


	public function show_first(Request $request){
		if( empty(Session::get('nama_pemilik')) ){
            return view('contents.form-login');
        }else{
            return view('contents.index');
        }
	}

	public function form_tambah_mobil(Request $request){
		return view('contents.form-mobil');
	}

	public function form_ubah_mobil(Request $request){
		$id_car = $request->code;
		$data = DB::select("SELECT * FROM tb_car WHERE id_car='$id_car'");
		if($data == "[]" || $data == []){ //Data tidak ada
			Alert::error('Data mobil tidak ditemukan');
			return view('contents.form-mobil', [
				'id_mobil' => '',
				'nama_mobil' => '',
				'harga_mobil' => '',
				'stok_mobil' => '',
				'action' => url('process-tambah-mobil') ,
				'title' => 'Tambah'
			]);
		}else{
			$data = json_decode(substr(substr(json_encode($data, true), 0, -1), 1), true);
			$nama_mobil = $data['name_of_car'];
			$harga_mobil = $data['price_car'];
			$stok_mobil = $data['stock_car'];
			return view('contents.form-mobil', [
				'id_mobil' => $id_car,
				'nama_mobil' => $nama_mobil,
				'harga_mobil' => $harga_mobil,
				'stok_mobil' => $stok_mobil,
				'action' => url('process-ubah-mobil') ,
				'title' => 'Ubah'
			]);
		}
	}

	public function data_mobil(Request $request){
		$data = DB::select("SELECT id_car, name_of_car,
				CONCAT('Rp ', REPLACE(REPLACE(REPLACE(FORMAT((price_car),0), '.', '|'), ',', '.'), '|', ',')) AS price_car,
				CONCAT(REPLACE(REPLACE(REPLACE(FORMAT((stock_car),0), '.', '|'), ',', '.'), '|', ','), ' Unit') AS stock_car
			FROM tb_car WHERE delete_time IS NULL");
		return view('contents.data-mobil', ['data' => $data]);	
	}

	public function form_penjualan(Request $request){
		$data_mobil = DB::select("SELECT id_car, name_of_car
			FROM tb_car WHERE delete_time IS NULL");
		return view('contents.form-penjualan', ['data_mobil' => $data_mobil]);
	}
}
