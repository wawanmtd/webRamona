<!--jika bukan accesslevel 1 -->
@if (Session::get('Member_ID') !=1)
  <script type="text/javascript">
      window.location.href = "dashboard";
  </script>
@endif
<!--  -->

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
          <tr>
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

          <tr>
            <td >{{$showmember->PersonData->PersonName}}</td>
            <td >{{$showmember->Username}}</td>
            <td ><strong>{{$showmember->MemberRoleData->NameRole}} </strong></td>
            <td >{{$showmember->PersonData->PersonContactData->ContactValue}}</td>
            <td >{{$showmember->PersonData->CountryData->CountryName}}</td>
            <td style="width:11%">
              <button class="btn btn-info" onclick="getData_Edit({{$showmember->Member_ID}})"><span class="fa fa-edit"></span></button>
              <button class="btn btn-danger" onclick="getData_Delete({{$showmember->Member_ID}})"><span class="fa fa-trash"></span></button>
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

              <!-- //option dari database -->
              <div class="form-group">
                <label for="Country_ID">Country</label>
                <select class="form-control" name="Country_ID" id="country_id" required>
                @foreach ($country as $co)
                  <option value="{{$co->Country_ID}}">{{$co->CountryName}}</option>
                @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="BlobType_ID">Picture Type</label>
                <select class="form-control" name="BlobType_ID" id="blobtype_id" required>
                @foreach ($blob as $bo)
                  <option value="{{$bo->BlobType_ID}}">{{$bo->TypeName}}</option>
                @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="Picture">Picture (upload*)</label>
                <input type="text" name="PersonPicture" id="picture" class="form-control" placeholder="PersonPicture" required>
              </div>

              <div class="form-group">
                <label for="ContactType_ID">Contact Type</label>
                <select class="form-control" name="ContactType_ID" id="Contacttype_id" required>
                  @foreach($contact as $co)
                  <option value="{{$co->ContactType_ID}}">
                  {{$co->ContactName}}</option>
                  @endforeach
                </select>
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
                <label for="MemberRole_ID">Member Role</label>
                <select class="form-control" name="MemberRole_ID" id="memberrole_id" required>
                @foreach($memberrole as $mro)
                  <option value="{{$mro->MemberRole_ID}}">{{$mro->NameRole}}</option>
                @endforeach
                </select>
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

<!-- modal Ubah Admin
  //changed.
end Ubah Admin -->

<!-- modal Hapus Admin -->
  <div class="modal fade" id="hapusAdminModal" tab-index="-1" role="dialog" aria-labeledby="hapusAdminModalLabel">
    <!-- some content -->
  </div>
<!-- end modal Hapus Admin -->

  <script>
  function getData_Edit(id){
    $.ajax({
      url:'kelolaAdmin/editmodal/'+id,
      dataType:'html',
      cache:false
    }).done(function(modalcontent){
      $('#hapusAdminModal').modal('show');
      $('#hapusAdminModal').html(modalcontent);
    }).fail(function(jqXHR, textStatus){
      alert('Request Failed : '+textStatus);
    });
  }

  function getData_Delete(id){
    $.ajax({
      url: 'kelolaAdmin/hapusmodal/'+id,
      dataType: 'html',
      cache:false
    }).done(function(modalContent){
      $('#hapusAdminModal').modal('show');
      $('#hapusAdminModal').html(modalContent);
    }).fail(function(jqXHR, textStatus){
      alert('Request Failed : '+textStatus);
    });
  }

  </script>
<script>
function getData_Edit(id){
  $.ajax({
    url:'kelolaAdmin/editmodal/'+id,
    dataType:'html',
    cache:false
  }).done(function(modalcontent){
    $('#hapusAdminModal').modal('show');
    $('#hapusAdminModal').html(modalcontent);
  }).fail(function(jqXHR, textStatus){
    alert('Request Failed : '+textStatus);
  });
}

function getData_Delete(id){
  $.ajax({
    url: 'kelolaAdmin/hapusmodal/'+id,
    dataType: 'html',
    cache:false
  }).done(function(modalContent){
    $('#hapusAdminModal').modal('show');
    $('#hapusAdminModal').html(modalContent);
  }).fail(function(jqXHR, textStatus){
    alert('Request Failed : '+textStatus);
  });
}

</script>
@stop
