@if (Session::get('Member_ID') == 1)

@extends('admin.index')



@section('content-header')
  Kelola Admin
  <small>Lihat Admin</small>
@stop

@section('konten')


<!-- Table Data Admin -->
<div class="row">
  <div class="col-sm-12">
  <div class="box">
    <div class="box-header">
      <button type="button" action="#tambah" data-toggle="modal" data-target="#tambahAdminModal" class="btn btn-success">
        <span class="fa fa-plus"></span> Tambah</button>
    </div>

    <div class="box-body">
      <table id="tableAdmin" class="table table-bordered table-striped">
        <thead>
          <tr role="row">
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Role</th>
            <th>Contact</th>
            <th>Country</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>

        @foreach ($ShowMember as $showmember)

          <tr class="odd" role="row">
            <td >{{$showmember->PersonData->PersonName}}</td>
            <td >{{$showmember->Username}}</td>
            <td >{{$showmember->MemberRoleData->NameRole}}</td>
            <td >{{$showmember->PersonData->PersonContactData->ContactValue}}</td>
            <td >{{$showmember->PersonData->CountryData->CountryName}}</td>
            <td style="width:10%">
              <button type="button" class="btn btn-info" id="{{$showmember->Member_ID}}" onclick="getData({{$showmember->Member_ID}})">
                <span class="fa fa-edit"></span></button>
              <button type="button" action="#hapus" data-toggle="modal" data-target="#hapusAdminModal" class="btn btn-danger">
                <span class="fa fa-trash"></span></button>
                <!-- <a class="btn btn-info" data-toggle='modal' data-target='#ubahAdminModal' href="kelolaAdmin/admineditmodal/{{$showmember->Member_ID}}"><span class="fa fa-edit"/></a>
                <a class="btn btn-danger" data-toggle='modal' data-target='#hapusAdminModal' data-hapusbutton="{{$showmember->Member_ID}}" href="kelolaAdmin/adminhapusmodal/{{$showmember->Member_ID}}"> <span class="fa fa-trash"/></a> -->
            </td>
          </tr>

              @endforeach
        </tbody>

        <tfoot>
          <tr>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Role</th>
            <th>Contact</th>
            <th>Country</th>
            <th>Action</th>
          </tr>
        </tfoot>
      </table>
    </div>
    </div>
  </div>
</div>
<!-- end Table Data Admin -->
<script type="text/javascript">
  $(document).ready(function() {
   $('#tableAdmin').dataTable();

});


</script>
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
          <form role="form" action="kelolaAdmin/tambahAdmin" id="tambahAdminModals" method="post">
            <div class="box-body">

              <div class="form-group">
                <label for="FullName">Full Name</label>
                <input type="text" name="PersonName" class="form-control" placeholder="Full Name" id="personname" required>
              </div>

              <div class="form-group">
                <label for="Nickname">Nickname</label>
                <input type="text" name="Nickname" class="form-control" placeholder="Nickname" id="nickname" required>
              </div>

              <div class="form-group">
                <label for="Address">Address</label>
                <input type="text" name="Address" class="form-control" placeholder="Address" id="address" required>
              </div>

              <div class="form-group">
                <label for="City">City</label>
                <input type="text" name="City" class="form-control" placeholder="City" id="city" required>
              </div>

              <div class="form-group">
                <label for="Country_ID">Country (harusnya pake option sih)</label>
                <select class="form-control" name="Country_ID" id="country_id" required>
                  <option value="">-- Select Country --</option>
                  <option value="1">Indonesia</option>
                </select>
                <!-- <input type="text" name="Country_ID" class="form-control" placeholder="Country" required> -->
              </div>

              <div class="form-group">
                <label for="BlobType_ID">BlobType_ID (ini juga option ceritanya)</label>
                <select class="form-control" name="BlobType_ID" id="blobtype_id" required>
                  <option value="">-- Select Blob Type --</option>
                  <option value="1">JPG</option>
                  <option value="2">PNG</option>
                  <option value="3">BMP</option>
                </select>
                <!-- <input type="text" name="BlobType_ID" class="form-control" placeholder="BlobType_ID" required> -->
              </div>

              <div class="form-group">
                <label for="Picture">Picture (upload*)</label>
                <input type="text" name="PersonPicture" id="picture" class="form-control" placeholder="PersonPicture" required>
              </div>

              <div class="form-group">
                <label for="ContactType_ID">ContactType_ID (ini juga option ceritanya)</label>
                <select class="form-control" name="ContactType_ID" id="Contacttype_id" required>
                  <option value="">-- Select Contact Type --</option>
                  <option value="1">Phone</option>
                  <option value="2">Email</option>
                  <option value="3">etc</option>
                </select>
                <!-- <input type="text" name="ContactType_ID" class="form-control" placeholder="ContactType_ID" required> -->
              </div>

              <div class="form-group">
                <label for="ContactValue">Contact Value</label>
                <input type="text" name="ContactValue" class="form-control"  placeholder="Enter Contact Value" id="contactvalue" required>
              </div>

              <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="Username" class="form-control"  placeholder="Username" id="username" required>
              </div>

              <div class="form-group">
                <label for="AccessCode">Password</label>
                <input type="password" name="AccessCode" class="form-control" placeholder="Password" id="accesscode" required>
              </div>

              <div class="form-group">
                <label for="MemberRole_ID">MemberRole_ID (ini juga option ceritanya)</label>
                <select class="form-control" name="MemberRole_ID" id="memberrole_id" required>
                  <option value="">-- Select Member Role --</option>
                  <option value="1">Super Admin</option>
                  <option value="2">Admin</option>
                  <option value="3">Manajerial</option>
                </select>
                <!-- <input type="text" name="MemberRole_ID" class="form-control" placeholder="MemberRole_ID" required> -->
              </div>

              <div class="form-group">
                <label for="Remark">Remark</label>
                <input type="text" name="Remark" class="form-control" placeholder="Remark" id="remark" required>
              </div>

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
          <form role="form" action="" method="post">
            <div class="box-body">

              <div class="form-group">
                <label for="FullName">Full Name</label>
                <input type="text" value="" data-fullname="" name="PersonName" class="form-control personname" placeholder="Full Name" required>
              </div>

              <div class="form-group">
                <label for="Nickname">Nickname</label>
                <input type="text" name="Nickname" class="form-control nickname" placeholder="Nickname" required>
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
                <select class="form-control" name="Country_ID" required>
                  <option value="">-- Select Country --</option>
                  <option value="1">Indonesia</option>
                </select>
                <!-- <input type="text" name="Country_ID" class="form-control" placeholder="Country" required> -->
              </div>

              <div class="form-group">
                <label for="BlobType_ID">BlobType_ID (ini juga option ceritanya)</label>
                <select class="form-control" name="BlobType_ID" required>
                  <option value="">-- Select Blob Type --</option>
                  <option value="1">JPG</option>
                  <option value="2">PNG</option>
                  <option value="3">BMP</option>
                </select>
                <!-- <input type="text" name="BlobType_ID" class="form-control" placeholder="BlobType_ID" required> -->
              </div>

              <div class="form-group">
                <label for="Picture">Picture (upload*)</label>
                <input type="text" name="PersonPicture" class="form-control" placeholder="PersonPicture" required>
              </div>

              <div class="form-group">
                <label for="ContactType_ID">ContactType_ID (ini juga option ceritanya)</label>
                <select class="form-control" name="ContactType_ID" required>
                  <option value="">-- Select Contact Type --</option>
                  <option value="1">Phone</option>
                  <option value="2">Email</option>
                  <option value="3">etc</option>
                </select>
                <!-- <input type="text" name="ContactType_ID" class="form-control" placeholder="ContactType_ID" required> -->
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
                <select class="form-control" name="MemberRole_ID" required>
                  <option value="">-- Select Member Role --</option>
                  <option value="1">Super Admin</option>
                  <option value="2">Admin</option>
                  <option value="3">Manajerial</option>
                </select>
                <!-- <input type="text" name="MemberRole_ID" class="form-control" placeholder="MemberRole_ID" required> -->
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
function getData(id){
  $.ajax({
    url : 'kelolaAdmin/admineditmodal',
    type: 'GET',
    data: {Member_ID:id},
    dataType: 'json'
  }).done(function(data){
    console.log(data.PersonName)
  });
}

// $(document).ready(function(){
//   $('#ubahAdminModal').on('hidden.bs.modal', function(event){
//     // var button = $(event.relatedTarget);
//     // //var recipient = button.data('ubahbutton');
//     // var row = button.closest("tr");

//     // var person = row.find("td:nth-child(1)").text();
//     // var nickame = row.find('td:nth-child(2)').text();
//     // var modal = $(this);
//     // modal.find('.modal-body .personname').val('');
//     // $(this).find('.modal-body .nickname').val(nickame);
//   });
// });
</script>

@stop


@endif


