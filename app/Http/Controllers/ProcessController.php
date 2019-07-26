<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Session;
use Validator;
use Redirect;
use Carbon\Carbon;
use DB;

class ProcessController extends Controller
{
    public function cek_login(Request $request){
    	// return $request->all();
    	$username = $request->username;
    	$password = md5($request->password);

    	$select = DB::select("SELECT * FROM tb_user 
    		WHERE username='$username' 
    			AND password='$password'");

    	if($select == "[]" || $select == []){ //Data tidak ada
    		Alert::error('Username atau Password salah');
    		return Redirect::to('');
    	}else{ //Data ada
    		$data = json_decode(substr(substr(json_encode($select, true), 0, -1), 1), true);

    		Alert::success("Selamat Datang");
			Session::put('nama_pemilik', $data['name']);   		
			return Redirect::to('');
    	}

    }

    public function logout(){
    	Session::flush();
        Alert::success('Anda berhasil Log Out');
        return Redirect::to('');
    }

    public function process_tambah_mobil(Request $request){
    	$nama_mobil = $request->nama_mobil;
    	$harga_mobil = $request->harga_mobil;
    	$stok_mobil = $request->stok_mobil;

    	$insert = DB::insert("INSERT INTO tb_car
    		SET name_of_car='$nama_mobil', 
    			price_car='$harga_mobil',
    			stock_car='$stok_mobil' ");

    	if($insert){
    		Alert::success("Berhasil Tambah Mobil");
    		return Redirect::to('data-mobil');
    	}else{
    		Alert::error("Gagal Tambah Mobil");
    		return Redirect::to('data-mobil');
    	}
    }

    public function process_ubah_mobil(Request $request){
    	$id_mobil = $request->id_mobil;
    	$nama_mobil = $request->nama_mobil;
    	$harga_mobil = $request->harga_mobil;
    	$stok_mobil = $request->stok_mobil;
    	$update_time = Carbon::now();

    	$update = DB::update("UPDATE tb_car
    		SET name_of_car='$nama_mobil', 
    			price_car='$harga_mobil',
    			stock_car='$stok_mobil',
    			update_time='$update_time'
    		WHERE id_car='$id_mobil' ");

    	if($update){
    		Alert::success("Berhasil Ubah Mobil");
    		return Redirect::to('data-mobil');
    	}else{
    		Alert::error("Gagal Ubah Mobil");
    		return Redirect::to('data-mobil');
    	}
    }

    public function process_hapus_mobil(Request $request){
    	$id_mobil = $request->id_mobil;
    	$delete_time = Carbon::now();

    	$update = DB::insert("UPDATE tb_car
    		SET delete_time='$delete_time'
    		WHERE id_car='$id_mobil' ");

    	if($update){
    		Alert::success("Berhasil Hapus Mobil");
    		return Redirect::to('data-mobil');
    	}else{
    		Alert::error("Gagal Hapus Mobil");
    		return Redirect::to('data-mobil');
    	}
    }

    public function tambah_penjualan(Request $request){
    	$nama_pembeli = $request->nama_pembeli;
    	$email_pembeli = $request->email_pembeli;
    	$mobil = $request->mobil;
    	$update_time = Carbon::now();

    	$data = DB::select("SELECT stock_car FROM tb_car WHERE id_car='$mobil'");
    		$data = json_decode(substr(substr(json_encode($data, true), 0, -1), 1), true);
			$stok_mobil = $data['stock_car'];

		if($stok_mobil < 0){
			Alert::error("Stok Mobil Tidak Tersedia");
    		return Redirect::to('form-input-penjualan');
		}else{
			$stok_mobil--;
	    	$insert = DB::insert("INSERT INTO tb_buyer
	    		SET name_of_buyer='$nama_pembeli', 
	    			email_buyer='$email_pembeli',
	    			id_car='$mobil' ");

	    	if($insert){

	    		$update = DB::update("UPDATE tb_car
		    		SET stock_car='$stok_mobil',
		    			update_time='$update_time'
		    		WHERE id_car='$mobil' ");

	    		Alert::success("Berhasil Tambah Penjualan");
	    		return Redirect::to('data-mobil');
	    		// return Redirect::to('invoice-penjualan');
	    	}else{
	    		Alert::error("Gagal Tambah Penjualan");
	    		return Redirect::to('form-input-penjualan');
	    	}	


		}
    }
}
