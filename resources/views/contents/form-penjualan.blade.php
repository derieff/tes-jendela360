@extends('layouts.master')

@section('title') Form Penjualan
@endsection

@section('content') 

	<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Penjualan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('tambah-penjualan') }}" method="post">
            	<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_pembeli">Nama Pembeli</label>
                  <input type="text" class="form-control" id="nama_pembeli" placeholder="Masukkan Nama Pembeli" required maxlength="50" name="nama_pembeli">
                </div>
                <div class="form-group">
                  <label for="harga_mobil">Email Pembeli</label>
	              <input type="email" class="form-control" id="email_pembeli" placeholder="Masukkan Email Pembeli" maxlength="50" required name="email_pembeli">
                </div>
                <div class="form-group">
                  <label for="mobil">Mobil yang dibeli</label>
	              <select name="mobil" required class="form-control" id="mobil">
	              	<option value="">- Silahkan Pilih Mobil -</option>
	              	@if($data_mobil != [])
	                    @foreach($data_mobil as $n => $d)
	                    <option value="{{ $d->id_car }}">{{ $d->name_of_car }}</option>
	                    @endforeach
                    @endif
	              </select>	
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
@endsection

@section('scripts_onpage') 
@endsection
