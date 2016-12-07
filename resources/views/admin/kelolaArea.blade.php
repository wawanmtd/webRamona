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
              <td>{{$showarea->AreaName}}</td>
              <td>{{$showarea->Description}}</td>
              <td>{{$showarea->CountryData->CountryName}}</td>
              <td>{{$showarea->MemberData->PersonData->PersonName}}</td>
              <td style="width:10%">

                <!-- <a class="btn btn-info ubahlink" data-toggle='modal' data-target='#tambahAreaModal' href="kelolaArea/areaeditmodal/{{$showarea->Area_ID}}"><span class="fa fa-edit"/></a> -->
                <!-- <button class="btn btn-info edit_data" data-toggle='modal' data-target='#tambahAreaModal'><span  class="fa fa-edit"/></button> -->

                <!-- punya wawan -->
                <button class="btn btn-info" onclick="getData_edit({{$showarea->Area_ID}})"><span class="fa fa-edit"/></button>
                <button class="btn btn-danger" onclick="getData_delete({{$showarea->Area_ID}})"><span class="fa fa-trash"/></button>

                <!-- <button class="btn btn-info edit_data" id="{{$showarea->Area_ID}}" onclick="getData({{$showarea->Area_ID}})" data-edit="{{$showarea->Area_ID}}"><span class="fa fa-edit"/></button> -->

                <!-- <button class="btn btn-info edit_data" id="{{$showarea->Area_ID}}" data-toggle='modal' ><span  class="fa fa-edit"/></button> -->

                <!-- <a  class="btn btn-danger" data-toggle='modal' data-target='#hapusAreaModal' href="kelolaArea/areahapusmodal/{{$showarea->Area_ID}}"> <span class="fa fa-trash"/></a> -->
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

            <div class="form-group">
              <label for="Country_ID">Country ID (bentuk option)</label>
<<<<<<< HEAD
              <input type="text" name="Country_ID" class="form-control country_id"  placeholder="Country_ID" required>
=======
              <!-- <input type="text" name="Country_ID" class="form-control"  placeholder="Country_ID" required> -->
              <select class="form-control" name="Country_ID" required>
                <option value="">--Select Country ID--</option>
                <option value="1">1</option>
              </select>
>>>>>>> origin/master
            </div>

            <div class="form-group">
              <label for="Member_ID">Member_ID (bentuk option)</label>
<<<<<<< HEAD
              <!-- <input type="text" name="Member_ID" class="form-control member_id"  placeholder="Member_ID" required> -->

              <select class="form-control" name="Member_ID" required>
                  <option value="1">asdas</option>
                  <option value="2">Email</option>
                  <option value="3">etc</option>
                </select>

=======
              <!-- <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" required> -->
              <select class="form-control" name="Member_ID" required>
                <option value="">--Select Member ID--</option>
                <option value="1">1</option>
              </select>
>>>>>>> origin/master
            </div>

            <input type="hidden" name="Area_ID" class="area_id">
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
                  <!-- <input id="ubahCountry_ID" type="text" name="Country_ID" class="form-control"  placeholder="Country_ID" value="" required> -->
                  <select class="form-control" name="Country_ID" id="ubahCountry_ID" required>
                    <option value="">--Select Country ID--</option>
                    <option value="1">1</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="Member_ID">Member_ID (bentuk option)</label>
                  <!-- <input id="ubahMember_ID" type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" value="" required> -->
                  <select class="form-control" name="Member_ID" id="ubahMember_ID" required>
                    <option value="">--Select Member ID--</option>
                    <option value="">1</option>
                  </select>
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
 end Ubah Area -->

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
function getData_edit(id){
    //alert(id);
  $.ajax({
    url: 'kelolaArea/areaeditmodal/'+id,
    dataType:'html',
    class:false
  }).done(function(modalContent){
    $('#hapusAreaModal').modal('show');
    $('#hapusAreaModal').html(modalContent);
  }).fail(function(jqXHR, textStatus){
      alert('Request Failed : '+textStatus);
  });
}

<<<<<<< HEAD
function getData_delete(id){
    alert(id);
  $.ajax({
    url: 'kelolaArea/areahapusmodal/'+id,
    dataType:'html',
    cache:false
  }).done(function(modalContent){
    $('#tambahAreaModal').modal('show');
    $('#tambahAreaModal').html(modalContent);
  }).fail(function(jqXHR, textStatus){
      alert('Request Failed : '+textStatus);
=======
</script>

<!-- <<<<<<< HEAD -->
<!-- <script>
$('#ubahAreaModal').on('shown.bs.modal', function () {
  // $('#myInput').focus();
  // $('input').val('');
})
$(function() {
  $(".modal").on("hidden.bs.modal", function() {
    $(this).removeData();
>>>>>>> origin/master
  });
}

  // $.ajax({
  //   // url: "{{URL::to('kelolaArea/areaeditmodal')}}",
  //   url: 'kelolaArea/areaeditmodal',
  //   type: "GET",
  //   data: {Area_ID: id},
  //   dataType: 'json',
  // }).done(function(data){
  //     console.log(data.AreaName);
  //         $('#formUbah').attr('action', "{{URL::to('kelolaArea/ubah')}}" + "/" + data.Area_ID);
  //         $('.areaname').val(data.AreaName);
  //         $('.description').val(data.Description);
  //         $('.remark').val(data.Remark);
  //         $('.country_id').val(data.Country_ID);
  //         $('.member_id').val(data.Member_ID);
  //         $('#myModalLabel').text('Edit Area : ' + data.AreaName);
  //         $('#tambahAreaModal').modal('show');
  //         document.getElementById('tambahAreaModals').action='kelolaArea/ubah/'+data.Area_ID;
  //         $('#_method').val('PUT');
  // }).error(function(jqXHR, textStatus){
  //   alert(textStatus);
  // });

// function getData(id){
//   $.ajax({
//     url: "{{URL::to('kelolaArea/areaeditmodal')}}",
//     type: "GET",
//     data: {Area_ID: id},
//     dataType: 'json',
//   }).done(function(data){
//       console.log(data.AreaName);
//       // console.log(data);
//       // $('#ubahAreaModal').modal({backdrop: 'static', keyboard: false});
//       // $('#ubahAreaModal').on('showbs.modal', function () {
//           // $('#formUbah').attr('action', "{{URL::to('kelolaArea/ubah')}}" + "/" + data.Area_ID);
//           // $('#ubahAreaName').val(data.AreaName);
//           // $('#ubahDescription').val(data.Description);
//           // $('#ubahRemark').val(data.Remark);
//           // $('#ubahCountry_ID').val(data.Country_ID);
//           // $('#ubahMember_ID').val(data.Member_ID);
//           $('#tambahAreaModal').modal('show');
//       // });
//         // .on('click', '#submitUbah', function(){
//         //
//         // });
//   }).error(function(jqXHR, textStatus){
//     alert(textStatus);
//   });
// }

<<<<<<< HEAD
=======
<!-- ======= -->
<script >
>>>>>>> origin/master
 //  $(".modal").on("hidden.bs.modal", function() {
 //     //$(this).removeData();
 //        modal.find('.modal').val('');
 //   });
 // )};
</script>
<<<<<<< HEAD
=======
<!-- >>>>>>> origin/master -->
>>>>>>> origin/master

@stop
