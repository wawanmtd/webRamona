@extends('admin.index')

@section('content-header')
  Kelola Area
  <small>Daftar Area</small>
@stop

@section('konten')
<!-- Table Data Area -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <button type="button" action="#tambah" data-toggle="modal" data-target="#tambahAreaModal" class="btn btn-success asdasd">
          <span class="fa fa-plus"></span> Tambah</button>
      </div>

      <div class="box-body">
        <table id="tableAdmin" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Area Name</th>
              <th>Description</th>
              <th>Country</th>
              <th>Member</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
              @foreach ($ShowArea as $showarea)
            <tr>
              <td onclick="getData_Detail({{$showarea->Area_ID}})">{{$showarea->AreaName}}</td>
              <td>{{$showarea->Description}}</td>
              <td>{{$showarea->CountryData->CountryName}}</td>
              <td>{{$showarea->MemberData->PersonData->PersonName}}</td>
              <td style="width:11%">
                <!-- punya wawan -->
                <button class="btn btn-info" onclick="getData_Edit({{$showarea->Area_ID}})"><span class="fa fa-edit"/></button>
                <button class="btn btn-danger" onclick="getData_Delete({{$showarea->Area_ID}})"><span class="fa fa-trash"/></button>
              </td>
            </tr>
              @endforeach

          </tbody>

          <tfoot>
            <tr>
              <th>Area Name</th>
              <th>Description</th>
              <th>Country</th>
              <th>Member</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- end box-body -->
    </div>
    <!-- end box -->
  </div>
  <!-- end col -->
</div>
<!-- end row -->

<script>
  $(function () {
    $("#tableAdmin").DataTable();
  });
</script>
<!-- end Table Data Area -->

<!-- modal Tambah Area -->
<div class="modal modaltambah fade" id="tambahAreaModal" tabindex="-1" role="dialog" aria-labelledby="tambahAreaModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tambahareaa">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Area</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="kelolaArea/tambahArea" method="post" id="tambahAreaModals">
          <div class="box-body">

             <div class="form-group">
              <label for="AreaName">Area Name</label>
              <input type="text" name="AreaName" class="form-control areaname"  placeholder="Area Name" required>
            </div>

            <div class="form-group">
              <label for="Description">Description</label>
              <input type="text" name="Description" class="form-control description"  placeholder="Description" required>
            </div>

            <div class="form-group">
              <label for="Remark">Remark</label>
              <input type="text" name="Remark" class="form-control remark"  placeholder="Remark" required>
            </div>

            <!-- //option dari database -->
              <div class="form-group">
                <label for="Country_ID">Country</label>
                <select class="form-control" name="Country_ID" id="country_id" required>
                @foreach ($country as $co)
                  <option value="{{$co->Country_ID}}">{{$co->CountryName}}</option>
                @endforeach
                </select>
              </div>

            <!-- <div class="form-group">
              <label for="Member_ID">Member_ID (bentuk option)</label>
              <input type="text" name="Member_ID" class="form-control member_id"  placeholder="Member_ID" required>
              <select class="form-control" name="Member_ID" required>
                <option value="">Select Member ID</option>
                <option value="1">1</option>
              </select>
            </div> -->

            <input type="hidden" name="Member_ID" value="{{Session::get('Member_ID')}}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" id="_method" value="POST">
            <div class="modal-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal Tambah Area -->

<!-- modal Ubah Area
 /// changed. 
 end Ubah Area -->

<!-- modal Hapus Area -->
<div class="modal fade" id="hapusAreaModal" tab-index="-1" role="dialog" aria-labeledby="hapusAreaModalLabel">
  <!-- some content. -->
</div>
<!-- end modal Hapus Area -->

<script>
function getData_Detail(id){
  $.ajax({
    url: 'kelolaArea/detail/'+id,
    dataType:'html',
    cache :false
  }).done(function(modalContent){
    $('#hapusAreaModal').modal('show');
    $('#hapusAreaModal').html(modalContent);
  }).fail(function(jqXHR, textStatus){
      alert('Request Failed : '+textStatus);
  });
}


function getData_Edit(id){
    //alert(id);
  $.ajax({
    url: 'kelolaArea/editmodal/'+id,
    dataType:'html',
    cache :false
  }).done(function(modalContent){
    $('#hapusAreaModal').modal('show');
    $('#hapusAreaModal').html(modalContent);
  }).fail(function(jqXHR, textStatus){
      alert('Request Failed : '+textStatus);
  });
}

function getData_Delete(id){
    // alert(id);
  $.ajax({
    url: 'kelolaArea/hapusmodal/'+id,
    dataType:'html',
    cache:false
  }).done(function(modalContent){
    $('#hapusAreaModal').modal('show');
    $('#hapusAreaModal').html(modalContent);
  }).fail(function(jqXHR, textStatus){
      alert('Request Failed : '+textStatus);
  });
}

</script>

@stop