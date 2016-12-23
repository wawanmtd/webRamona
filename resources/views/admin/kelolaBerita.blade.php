<!--jika bukan accesslevel 1 -->
@if (Session::get('AccessLevel') !=1)
  <script type="text/javascript">
      window.location.href = "dashboard";
  </script>
@endif
<!--  -->
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
        <button class="btn btn-success" href="#tambah" data-toggle="modal" data-target="#tambahBeritaModal"><span class="fa fa-plus"></span> Tambah</button>
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
            @foreach ($newss as $news)
            <tr> 
              <td>{{$news->NewsTitle}}</td>
              <td>{{$news->MemberData->PersonData->PersonName}}</td>
              <td>{{$news->NewsTypeData->NewsTypeName}}</td>
              <td>Approved</td>
              <td>{{$news->created_at}}</td>
              <td style="width:15%">
                <a href="#" class="btn btn-primary disabled" ><span class="fa fa-check"></span></a>
                <a href="#" class="btn btn-info"><span class="fa fa-edit"></span></a>
                <a href="#" class="btn btn-danger"><span class="fa fa-trash"></span></a>
              </td>
            </tr>
            @endforeach
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

<!-- modal Tambah Berita -->
  <div class="modal fade" id="tambahBeritaModal" tabindex="-1" role="dialog" aria-labelledby="tambahBeritaModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Berita</h4>
        </div>

        <div class="modal-body ">
          <form role="form" action="kelolaBerita/tambahBerita" method="post">
            <div class="box-body">

              <div class="form-group">
                <label for="NewsType_ID">News Type</label>
                <select class="form-control" name="NewsType_ID" required>
                  @foreach($newsType as $nt)
                  <option value="{{$nt->NewsType_ID}}">
                  {{$nt->NewsTypeName}}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="News">Urgent?</label>
                <select class="form-control" name="IsUrgent" required>
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
                </select>
              </div>

              <div class="form-group">
                <label for="News">News Title</label>
                <input type="text" name="NewsTitle" class="form-control" placeholder="News Title" required>
              </div>

              <div class="form-group">
                <label for="News">News Content</label>
                <input type="text" name="NewsContent" class="form-control" placeholder="News Content" required>
              </div>

              <input type="hidden" name="Member_ID" value="{{Session::get('Member_ID')}}">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <input type="hidden" name="_method" value="POST" id="_method">
              <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- end modal Tambah Berita -->



@stop
