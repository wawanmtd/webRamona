@extends('admin.index')

@section('content-header')
  Kelola Berita
  <small>Daftar Berita</small>
@stop

@section('konten')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a class="btn btn-success" href="#" ><span class="fa fa-plus"></span> Tambah</a>
      </div>

      <div class="box-body">
        <table id="tableBerita" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Categories</th>
              <th>Status</th>
              <th>Date Published</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>Approved</td>
              <td></td>
              <td style="width:15%">
                <a href="#" class="btn btn-primary disabled" ><span class="fa fa-check"></span></a>
                <a href="#" class="btn btn-info"><span class="fa fa-edit"></span></a>
                <a href="#" class="btn btn-danger"><span class="fa fa-trash"></span></a>
              </td>
            </tr>
          </tbody>

          <tfoot>
            <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Categories</th>
              <th>Status</th>
              <th>Date Published</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <!-- box -->
  </div>
  <!-- col-xs-12 -->
</div>
<!-- row -->

<script>
  $(function(){
    $('#tableBerita').DataTable();
  });
</script>
@stop
