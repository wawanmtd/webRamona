<!-- <script src="../bootstrap/adminlte/plugins/fastclick/fastclick.min.js"></script> -->
<!-- <script src="../bootstrap/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script> -->
<!-- <script src="../bootstrap/adminlte/plugins/datatables/jquery.dataTables.min.js"></script> -->
<!-- <script src="../bootstrap/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script> -->
<!-- <script src="../bootstrap/adminlte/js/demo.js"></script> -->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js "></script>
@extends('admin.index')

@section('head')
<script type="text/javascript">

  $(document).on('click', '#ubahAdminModal_ID', function(){
  var myBook_ID = $(this).data('book-id');
  return myBook_ID;
  // $('.modal-body #edit_personname').val(myBook_ID);
  // $('#ubah').modal('show');
});

  // $(document).on('click', '.open-addButtonDialog', function(){
  // var mybookid = $(this).data('id');
  // $('.modal-body #bookid').val(mybookid);
  // $('#addBookDialog').modal('show');
  // });

  //referensi lain
//   $('#my_modal').on('show.bs.modal', function(e) {
//     var bookId = $(e.relatedTarget).data('book-id');
//     $(e.currentTarget).find('input[name="bookId"]').val(bookId);
// });
  </script>
@stop

@section('content-header')
  Kelola Admin
  <small>Lihat Admin</small>
@stop

@section('konten')
  <button type="button" action="#tambah" data-toggle="modal" data-target="#tambahAdminModal" class="btn btn-success">
    <span class="fa fa-plus"></span> Tambah</button>

<!-- Table Data Admin -->
<div class="row">
  <div class="col-sm-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Admin</h3>
    </div>

    <div class="box-body">
      <div id="tableAdmin_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        <div class="row">

        </div>


            <table id="tableAdmin" class="table table-bordered table-striped dataTable display" role="grid">
              <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="tableAdmin" aria-label="Nama Lengkap: active to sort column ascending">Nama Lengkap</th>
                  <th class="sorting" tabindex="0" aria-controls="tableAdmin" aria-label="Username: active to sort column ascending">Username</th>
                  <th class="sorting" tabindex="0" aria-controls="tableAdmin" aria-label="Role: active to sort column ascending">Role</th>
                  <th class="sorting" tabindex="0" aria-controls="tableAdmin" aria-label="Station: active to sort column ascending">Station</th>
                  <th class="sorting" tabindex="0" aria-controls="tableAdmin" aria-label="Area: active to sort column ascending">Country</th>
                  <th colspan="2">Action</th>
                </tr>
              </thead>

              <tbody>

              @foreach ($ShowMember as $showmember)

                <tr class="odd" role="row">
                  <td >{{$showmember->PersonData->PersonName}}</td>
                  <td >{{$showmember->Username}}</td>
                  <td >{{$showmember->MemberRoleData->NameRole}}</td>
                  <td >{{$showmember->StationData->StationName}}</td>
                  <td >{{$showmember->PersonData->CountryData->CountryName}}</td>
                  <td style="width:5%">
                    <button type="button" action="#ubah" data-toggle="modal" data-target="#ubahAdminModal" data-content class="btn btn-info" id="ubahAdminModal_ID" data-id='asdasd' href='#ubah'>
                      <span class="fa fa-edit"></span></button>
                    </td>
                    <td style="width:5%">
                      <button type="button"  action="#hapus" data-toggle="modal" data-target="#hapusAdminModal" data-book-id='asd' class="btn btn-danger">
                        <span class="fa fa-trash"></span></button>
                      </td>
                    </tr>

                    @endforeach
<!-- 
                    <tr class="even" role="row">
                      <td >Muchtar Prawira</td>
                      <td >muchtarpr</td>
                      <td >Admin</td>
                      <td >Batan</td>
                      <td >Puspiptek</td>
                      <td>
                        <button type="button" action="#ubah" data-toggle="modal" data-target="#ubahAdminModal" class="btn btn-info">
                          <span class="fa fa-edit"></span></button>
                        </td>
                        <td>
                          <button type="button" action="#hapus" data-toggle="modal" data-target="#hapusAdminModal" class="btn btn-danger">
                            <span class="fa fa-trash"></span></button>
                          </td>
                        </tr>

                        <tr class="odd" role="row">
                          <td class="">Gerald Viko Ananda</td>
                          <td class="">seishiro</td>
                          <td class="">Manajerial</td>
                          <td class="">Batan</td>
                          <td class="">Puspiptek</td>
                          <td>
                            <button type="button" action="#ubah" data-toggle="modal" data-target="#ubahAdminModal" class="btn btn-info">
                              <span class="fa fa-edit"></span></button>
                            </td>
                            <td>
                              <button type="button" action="#hapus" data-toggle="modal" data-target="#hapusAdminModal" class="btn btn-danger">
                                <span class="fa fa-trash"></span></button>
                              </td>
                            </tr> -->
                          </tbody>

                          <tfoot>
                            <tr>
                              <th>Nama Lengkap</th>
                              <th>Username</th>
                              <th>Role</th>
                              <th>Station</th>
                              <th>Country</th>
                              <th colspan="2">Action</th>
                            </tr>
                          </tfoot>
                        </table>
          </div>
        </div>
      </div>

    </div>
  </div>
<!-- end Table Data Admin -->

<!-- modal Hapus Admin -->
  <div class="modal fade" id="hapusAdminModal" tab-index="-1" role="dialog" aria-labeledby="hapusAdminModalLabel">
    <div class="modal-dialog modal-sm" role="alertdialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="gridSystemModalLabel">Yakin hapus?</h4>
        </div>

        <div class="modal-footer">
          <a role="button" type="button" class="btn btn-danger" href="kelolaAdmin/hapusAdmin">Hapus</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>
<!-- end modal Hapus Admin -->


<!-- modal Tambah Admin -->
  <div class="modal fade" id="tambahAdminModal" tabindex="-1" role="dialog" aria-labelledby="tambahAdminModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Admin</h4>
        </div>

        <div class="modal-body ">
          <form role="form" action="kelolaAdmin/tambahAdmin" method="post">
            <div class="box-body">
              
              <div class="form-group">
                <label for="FullName">Full Name</label>
                <input type="text" name="PersonName" class="form-control" placeholder="Full Name" id="edit_personname" required>
              </div>

              <div class="form-group">
                <label for="Nickname">Nickname</label>
                <input type="text" name="Nickname" class="form-control" placeholder="Nickname" required>
              </div>

              <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="Address" class="form-control" placeholder="Address" required>
              </div>

              <div class="form-group">
                <label for="City">City</label>
                <input type="text" name="City" class="form-control" placeholder="City" required>
              </div>

              <div class="form-group">
                <label for="Country_ID">Country (harusnya pake option sih)</label>
                <input type="text" name="Country_ID" class="form-control" placeholder="Country" required>
              </div>

              <div class="form-group">
                <label for="BlobType_ID">BlobType_ID (ini juga option ceritanya)</label>
                <input type="text" name="BlobType_ID" class="form-control" placeholder="BlobType_ID" required>
              </div>

              <div class="form-group">
                <label for="Picture">Picture (upload*)</label>
                <input type="text" name="PersonPicture" class="form-control" placeholder="PersonPicture" required>
              </div>

              <div class="form-group">
                <label for="ContactType_ID">ContactType_ID (ini juga option ceritanya)</label>
                <input type="text" name="ContactType_ID" class="form-control" placeholder="ContactType_ID" required>
              </div>              

              <div class="form-group">
                <label for="ContactValue">Contact Value</label>
                <input type="text" name="ContactValue" class="form-control"  placeholder="Enter Contact Value" required>
              </div>

              <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="Username" class="form-control"  placeholder="Username" required>
              </div>

              <div class="form-group">
                <label for="AccessCode">Password</label>
                <input type="password" name="AccessCode" class="form-control" placeholder="Password" required>
              </div>

              <div class="form-group">
                <label for="MemberRole_ID">MemberRole_ID (ini juga option ceritanya)</label>
                <input type="text" name="MemberRole_ID" class="form-control" placeholder="MemberRole_ID" required>
              </div>

              <div class="form-group">
                <label for="Remark">Remark</label>
                <input type="text" name="Remark" class="form-control" placeholder="Remark" required>
              </div>

              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- end modal Tambah Admin -->

<!-- modal Ubah Admin -->
  <div class="modal fade" id="ubahAdminModal" tabindex="0" role="dialog" aria-labelledby="ubahAdminModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Ubah Admin</h4>
        </div>

        <div class="modal-body ">
          <form role="form" action="{{action("adminController\KelolaAdminController@ubah")}}" method="post">
            <div class="box-body">
              
              <div class="form-group">
                <label for="FullName">Full Name</label>
                <input type="text" name="PersonName" class="form-control" placeholder="Full Name" required>
              </div>

              <div class="form-group">
                <label for="Nickname">Nickname</label>
                <input type="text" name="Nickname" class="form-control" placeholder="Nickname" required>
              </div>

              <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="Address" class="form-control" placeholder="Address" required>
              </div>

              <div class="form-group">
                <label for="City">City</label>
                <input type="text" name="City" class="form-control" placeholder="City" required>
              </div>

              <div class="form-group">
                <label for="Country_ID">Country (harusnya pake option sih)</label>
                <input type="text" name="Country_ID" class="form-control" placeholder="Country" required>
              </div>

              <div class="form-group">
                <label for="BlobType_ID">BlobType_ID (ini juga option ceritanya)</label>
                <input type="text" name="BlobType_ID" class="form-control" placeholder="BlobType_ID" required>
              </div>

              <div class="form-group">
                <label for="Picture">Picture (upload*)</label>
                <input type="text" name="PersonPicture" class="form-control" placeholder="PersonPicture" required>
              </div>

              <div class="form-group">
                <label for="ContactType_ID">ContactType_ID (ini juga option ceritanya)</label>
                <input type="text" name="ContactType_ID" class="form-control" placeholder="ContactType_ID" required>
              </div>              

              <div class="form-group">
                <label for="ContactValue">Contact Value</label>
                <input type="text" name="ContactValue" class="form-control"  placeholder="Enter Contact Value" required>
              </div>

              <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="Username" class="form-control"  placeholder="Username" required>
              </div>

              <div class="form-group">
                <label for="AccessCode">Password</label>
                <input type="password" name="AccessCode" class="form-control" placeholder="Password" required>
              </div>

              <div class="form-group">
                <label for="MemberRole_ID">MemberRole_ID (ini juga option ceritanya)</label>
                <input type="text" name="MemberRole_ID" class="form-control" placeholder="MemberRole_ID" required>
              </div>

              <div class="form-group">
                <label for="Remark">Remark</label>
                <input type="text" name="Remark" class="form-control" placeholder="Remark" required>
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
<!-- end Ubah Admin -->



<script>
$(document).ready(function() {
    $('#tableAdmin').dataTable();
});

</script>
@stop
