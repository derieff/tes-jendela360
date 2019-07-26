@extends('layouts.master')

@section('title') Form {{ $title }} Mobil
@endsection

@section('content') 

	<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form {{ $title }} Mobil</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ $action }}" method="post">
            	<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
            	<input type="hidden" name="id_mobil" value="{{ $id_mobil }}" />
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_mobil">Nama Mobil</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Mobil" required maxlength="50" name="nama_mobil" value="{{ $nama_mobil }}">
                </div>
                <div class="form-group">
                  <label for="harga_mobil">Harga</label>
                  <div class="input-group">
	                  <span class="input-group-addon">Rp. </span>
	                  <input type="number" class="form-control" id="harga_mobil" placeholder="Masukkan Harga Mobil" required onkeypress="cek_harga()" onkeyup="cek_harga()" onchange="cek_harga()" name="harga_mobil" value="{{ $harga_mobil }}">
	              </div>
                </div>
                <div class="form-group">
                  <label for="stok_mobil">Stok</label>
                  <div class="input-group">
	                  <input type="number" class="form-control" id="stok_mobil" placeholder="Masukkan Stok Mobil" required onkeypress="cek_stok()" onkeyup="cek_stok()" onchange="cek_stok()" name="stok_mobil" value="{{ $stok_mobil }}">
	                  <span class="input-group-addon">Unit</span>
	              </div>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer text-right">
                <button type="submit" class="btn btn-success">
                	<i class="fa fa-save"></i>
	                SIMPAN
	            </button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
    </div>
@endsection

@section('styles') 
@endsection

@section('scripts_src') 
<script>

	function cek_harga(){
		var harga_mobil = $('#harga_mobil').val();
		if( parseInt(harga_mobil) > 10000000000){ //Lebih dari 10 Miliar
			swal({
                title: "Gagal.",
                text: "Harga Mobil Maks. Rp 10.000.000.000",
                showConfirmButton: false,
                timer: 2500,
                type: "error",
            });
			$('#harga_mobil').val("10000000000");
		}else if( parseInt(harga_mobil) < 0){
			$('#harga_mobil').val("0");
		}
	}

	function cek_stok(){
		var stok_mobil = $('#stok_mobil').val();
		if( parseInt(stok_mobil) > 1000){ //Lebih dari 1000
			swal({
                title: "Gagal.",
                text: "Stok Mobil Maks. 1.000 Unit",
                showConfirmButton: false,
                timer: 2500,
                type: "error",
            });
			$('#stok_mobil').val("1000");
		}else if( parseInt(stok_mobil) < 0){
			$('#stok_mobil').val("0");
		}
	}
</script>
@endsection

@section('scripts_onpage') 
@endsection

