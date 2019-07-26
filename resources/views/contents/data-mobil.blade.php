@extends('layouts.master')

@section('title') Data Mobil
@endsection

@section('content') 

	<div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Mobil</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="table-data-mobil" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nama Mobil</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Opt.</th>
                </tr>
                </thead>
                <tbody>
                  @if($data != [])
                    @foreach($data as $n => $d)
                    <tr>
                      <td>{{ $d->name_of_car }}</td>
                      <td>{{ $d->price_car }}</td>
                      <td>{{ $d->stock_car }}</td>
                      <td>
                        <a href="{{ url('process-hapus-mobil').'/'.$d->id_car}}" class="btn btn-warning">
                          Ubah
                        </a>
                        <a href='#' class="btn btn-danger">
                          Hapus
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('styles') 
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('public/template/plugins/datatables/dataTables.bootstrap.css') }}">
@endsection

@section('scripts_src') 

<!-- DataTables -->
<script src="{{ url('public/template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('public/template/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

@endsection

@section('scripts_onpage') 
<script>
  $(function () {
    $('#table-data-mobil').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection

