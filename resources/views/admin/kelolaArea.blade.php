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
        <button type="button" action="#tambah" data-toggle="modal" data-target="#tambahAreaModal" class="btn btn-success">
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
              <td>{{$showarea->AreaName}}</td>
              <td>{{$showarea->Description}}</td>
              <td>{{$showarea->CountryData->CountryName}}</td>
              <td>{{$showarea->MemberData->PersonData->PersonName}}</td>
              <td style="width:10%">
                <!-- <a class="btn btn-info" data-toggle='modal' data-target='#ubahAreaModal' href="kelolaArea/areaeditmodal/{{$showarea->Area_ID}}"><span class="fa fa-edit"/></a> -->
                <button class="btn btn-info" onclick="getData({{$showarea->Area_ID}})"><span class="fa fa-edit"/></button>
                <a  class="btn btn-danger" data-toggle='modal' data-target='#hapusAreaModal' href="kelolaArea/areahapusmodal/{{$showarea->Area_ID}}"> <span class="fa fa-trash"/></a>
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
              <th colspan="2">Action</th>
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
        <form role="form" action="kelolaArea/tambahArea" method="post">
          <div class="box-body">

             <div class="form-group">
              <label for="AreaName">Area Name</label>
              <input type="text" name="AreaName" class="form-control areanames"  placeholder="Area Name" required>
            </div>

            <div class="form-group">
              <label for="Description">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" required>
            </div>

            <div class="form-group">
              <label for="Remark">Remark</label>
              <input type="text" name="Remark" class="form-control"  placeholder="Remark" required>
            </div>

            <div class="form-group">
              <label for="Country_ID">Country ID (bentuk option)</label>
              <input type="text" name="Country_ID" class="form-control"  placeholder="Country_ID" required>
            </div>

            <div class="form-group">
              <label for="Member_ID">Member_ID (bentuk option)</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" required>
            </div>
          <input type="hidden" name="_token" value="{{csrf_token()}}">
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

<!-- modal Ubah Area -->
<div class="modal fade" id="ubahAreaModal" tabindex="0" role="dialog" aria-labelledby="ubahAreaModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Ubah Area</h4>
          </div>

          <div class="modal-body ">
            <form id="formUbah" role="form" action="" method="post">
              <div class="box-body">

                 <div class="form-group">
                  <label for="AreaName">Area Name</label>
                  <input id="ubahAreaName" type="text" name="AreaName" class="form-control"  placeholder="Area Name" value="" required>
                </div>

                <div class="form-group">
                  <label for="Description">Description</label>
                  <input id="ubahDescription" type="text" name="Description" class="form-control"  placeholder="Description" value="" required>
                </div>

                <div class="form-group">
                  <label for="Remark">Remark</label>
                  <input id="ubahRemark" type="text" name="Remark" class="form-control"  placeholder="Remark" value="" required>
                </div>

                <div class="form-group">
                  <label for="Country_ID">Country ID (bentuk option)</label>
                  <input id="ubahCountry_ID" type="text" name="Country_ID" class="form-control"  placeholder="Country_ID" value="" required>
                </div>

                <div class="form-group">
                  <label for="Member_ID">Member_ID (bentuk option)</label>
                  <input id="ubahMember_ID" type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" value="" required>
                </div>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">
                <div class="modal-footer">
                  <button id="submitUbah" class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Ubah Area -->

<!-- modal Hapus Area -->
<div class="modal fade" id="hapusAreaModal" tab-index="-1" role="dialog" aria-labeledby="hapusAreaModalLabel">
  <div class="modal-dialog modal-sm" role="alertdialog">
    <div class="modal-content">
      <!--  -->
      <div class="modal-header">
        <h4 class="modal-title" id="gridSystemModalLabel">Yakin hapus Area?</h4>
      </div>

      <div class="modal-footer">
        <a role="button" type="button" class="btn btn-danger" href="">Hapus</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal Hapus Area -->
<script>
function getData(id){
  $.ajax({
    url: "{{URL::to('kelolaArea/areaeditmodal')}}",
    type: "GET",
    data: {idArea: id},
    dataType: 'json',
  }).done(function(data){
      console.log(data.AreaName);
      // console.log(data);
      // $('#ubahAreaModal').modal({backdrop: 'static', keyboard: false});
      // $('#ubahAreaModal').on('showbs.modal', function () {
          $('#formUbah').attr('action', "{{URL::to('kelolaArea/ubah')}}" + "/" + data.Area_ID);
          $('#ubahAreaName').val(data.AreaName);
          $('#ubahDescription').val(data.Description);
          $('#ubahRemark').val(data.Remark);
          $('#ubahCountry_ID').val(data.Country_ID);
          $('#ubahMember_ID').val(data.Member_ID);
          $('#ubahAreaModal').modal('show');
      // });
        // .on('click', '#submitUbah', function(){
        //
        // });
  }).error(function(jqXHR, textStatus){
    alert(textStatus);
  });
}

</script>

<!-- <script>
$('#ubahAreaModal').on('shown.bs.modal', function () {
  // $('#myInput').focus();
  // $('input').val('');
})
$(function() {
  $(".modal").on("hidden.bs.modal", function() {
    $(this).removeData();
  });
});
// function getData(id){
//   console.log(id);
//   $.ajax({
//     url: "{{URL::to('kelolaArea/areaeditmodal')}}",
//     type: "GET",
//     data: {idArea: id},
//     dataType: 'json',
//   }).done(function(data){
//       console.log(data);
//   }).error(function(jqXHR, textStatus){
//     alert(textStatus);
//   });
// }
</script> -->



@stop
