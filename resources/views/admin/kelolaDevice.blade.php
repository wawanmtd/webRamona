@extends('admin.index')

@section('content-header')
  Kelola Device
  <small>Tambah Device</small>
@stop

@section('konten')
<button type="button" action="#tambah" data-toggle="modal" data-target="#tambahDeviceModal" class="btn btn-success">
  <span class="fa fa-plus"></span> Tambah</button>

<!-- Table Data Device -->
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Daftar Device</h3>
  </div>

  <div class="box-body">
    <table id="tableDevice" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Device Name</th>
          <th>Device Type</th>
          <th>Address</th>
          <th>Area</th>
          <th>Member</th>
          <th>Installation Date</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>Device Name</td>
          <td>Desc</td>
          <td>Address</td>
          <td>-</td>
          <th>Member</th>
          <td>Installation</td>
          <td style="width:5%">
            <button type="button" action="#ubah" data-toggle="modal" data-target="#ubahDeviceModal" class="btn btn-info">
              <span class="fa fa-edit"></span></button>
          </td>
          <td style="width:5%">
            <button type="button" action="#hapus" data-toggle="modal" data-target="#hapusDeviceModal" class="btn btn-danger">
              <span class="fa fa-trash"></span></button>
          </td>
        </tr>

        
      </tbody>

      <tfoot >
        <tr>
          <th>Device Name</th>
          <th>Device Type</th>
          <th>Address</th>
          <th>Area</th>
          <th>Member</th>
          <th>Installation Date</th>
          <th colspan="2">Action</th>

        </tr>
      </tfoot>
    </table>

  </div>
</div>
<!-- end Table Data Device -->

<!-- modal Tambah Device -->
<div class="modal fade" id="tambahDeviceModal" tabindex="-1" role="dialog" aria-labelledby="tambahDeviceModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Device</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="kelolaDevice/tambahDevice" method="post">
          <div class="box-body">

             <div class="form-group">
              <label for="Device">DeviceType_ID</label>
              <input type="text" name="DeviceType_ID" class="form-control"  placeholder="DeviceType_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Location</label>
              <input type="text" name="Location" class="form-control"  placeholder="Location" required>
            </div>

            <div class="form-group">
              <label for="Device">Device Name</label>
              <input type="text" name="DeviceName" class="form-control"  placeholder="DeviceName" required>
            </div>

            <div class="form-group">
              <label for="Device">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" required>
            </div>

            <div class="form-group">
              <label for="Device">Address</label>
              <input type="text" name="Address" class="form-control"  placeholder="Address" required>
            </div>

            <div class="form-group">
              <label for="Device">City</label>
              <input type="text" name="City" class="form-control"  placeholder="City" required>
            </div>

            <div class="form-group">
              <label for="Device">Country_ID</label>
              <input type="text" name="Country_ID" class="form-control"  placeholder="Country_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Power Source</label>
              <input type="text" name="PowerSource" class="form-control"  placeholder="PowerSource" required>
            </div>

            <div class="form-group">
              <label for="Device">Installation Date</label>
              <input type="Date" name="InstallationDate" class="form-control"  placeholder="InstallationDate" required>
            </div>

            <div class="form-group">
              <label for="Device">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">MarkerType_ID</label>
              <input type="text" name="MarkerType_ID" class="form-control"  placeholder="MarkerType_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">DocumentType_ID</label>
              <input type="text" name="DocumentType_ID" class="form-control"  placeholder="DocumentType_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Device Marker</label>
              <input type="text" name="DeviceMarker" class="form-control"  placeholder="DeviceMarker" required>
            </div>

            <div class="form-group">
              <label for="Device">Device Document</label>
              <input type="text" name="DeviceDocument" class="form-control"  placeholder="DeviceDocument" required>
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
<!-- end modal Tambah Device -->

<!-- modal Ubah Device -->
<div class="modal fade" id="ubahDeviceModal" tabindex="0" role="dialog" aria-labelledby="ubahDeviceModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Device</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="{{action("adminController\KelolaDeviceController@ubah")}}" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email" value="" required>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" value="" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" value="" required>
            </div>

            <div class="modal-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end Ubah Device -->

<!-- modal Hapus Device -->
<div class="modal fade" id="hapusDeviceModal" tab-index="-1" role="dialog" aria-labeledby="hapusDeviceModalLabel">
  <div class="modal-dialog modal-sm" role="alertdialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="gridSystemModalLabel">Yakin hapus?</h4>
      </div>

      <div class="modal-footer">
        <a role="button" type="button" class="btn btn-danger" href="{{action("adminController\KelolaDeviceController@hapus")}}">Hapus</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal Hapus Device -->

@stop
