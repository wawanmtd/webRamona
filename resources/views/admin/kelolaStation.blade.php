@extends('admin.index')

@section('content-header')
  Kelola Station
  <small>Tambah Station</small>
@stop

@section('konten')
<button type="button" action="#tambah" data-toggle="modal" data-target="#tambahStationModal" class="btn btn-success">
  <span class="fa fa-plus"></span> Tambah</button>

<!-- Table Data Station -->
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Daftar Station</h3>
  </div>

  <div class="box-body">
    <table id="tableStation" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Station Name</th>
          <th>Station Type</th>
          <th>Address</th>
          <th>Area</th>
          <th>Member</th>
          <th>Installation Date</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>

      <tbody>
      @foreach ($ShowStation as $showstation)
        <tr>
          <td>{{$showstation->StationName}}</td>
          <td>{{$showstation->StationTypeData->Description}}</td>
          <td>{{$showstation->Address}}</td>
          <td>-</td>
          <th>{{$showstation->MemberData->PersonData->PersonName}}</th>
          <td>{{$showstation->InstallationDate}}</td>
          <td style="width:5%">
            <button type="button" action="#ubah" data-toggle="modal" data-target="#ubahStationModal" class="btn btn-info">
              <span class="fa fa-edit"></span></button>
          </td>
          <td style="width:5%">
            <button type="button" action="#hapus" data-toggle="modal" data-target="#hapusStationModal" class="btn btn-danger">
              <span class="fa fa-trash"></span></button>
          </td>
        </tr>
        @endforeach

        
      </tbody>

      <tfoot >
        <tr>
          <th>Station Name</th>
          <th>Station Type</th>
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

<!-- end Table Data Station -->

<!-- modal Tambah Station -->
<div class="modal fade" id="tambahStationModal" tabindex="-1" role="dialog" aria-labelledby="tambahStationModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Station</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="kelolaStation/tambahStation" method="post">
          <div class="box-body">

            <div class="form-group">
              <label for="Station">Area_ID</label>
              <input type="text" name="Area_ID" class="form-control"  placeholder="Area_ID" required>
            </div>

             <div class="form-group">
              <label for="Station">StationType_ID</label>
              <input type="text" name="StationType_ID" class="form-control"  placeholder="StationType_ID" required>
            </div>

            <div class="form-group">
              <label for="Station">Location</label>
              <input type="text" name="Location" class="form-control"  placeholder="Location" required>
            </div>

            <div class="form-group">
              <label for="Station">Station Name</label>
              <input type="text" name="StationName" class="form-control"  placeholder="StationName" required>
            </div>

            <div class="form-group">
              <label for="Station">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" required>
            </div>

            <div class="form-group">
              <label for="Station">Address</label>
              <input type="text" name="Address" class="form-control"  placeholder="Address" required>
            </div>

            <div class="form-group">
              <label for="Station">City</label>
              <input type="text" name="City" class="form-control"  placeholder="City" required>
            </div>

            <div class="form-group">
              <label for="Station">Country_ID</label>
              <input type="text" name="Country_ID" class="form-control"  placeholder="Country_ID" required>
            </div>

            <div class="form-group">
              <label for="Station">Power Source</label>
              <input type="text" name="PowerSource" class="form-control"  placeholder="PowerSource" required>
            </div>

            <div class="form-group">
              <label for="Station">Installation Date</label>
              <input type="Date" name="InstallationDate" class="form-control"  placeholder="InstallationDate" required>
            </div>

            <div class="form-group">
              <label for="Station">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" required>
            </div>

            <div class="form-group">
              <label for="Station">MarkerType_ID</label>
              <input type="text" name="MarkerType_ID" class="form-control"  placeholder="MarkerType_ID" required>
            </div>

            <div class="form-group">
              <label for="Station">DocumentType_ID</label>
              <input type="text" name="DocumentType_ID" class="form-control"  placeholder="DocumentType_ID" required>
            </div>

            <div class="form-group">
              <label for="Station">Station Marker</label>
              <input type="text" name="StationMarker" class="form-control"  placeholder="StationMarker" required>
            </div>

            <div class="form-group">
              <label for="Station">Station Document</label>
              <input type="text" name="StationDocument" class="form-control"  placeholder="StationDocument" required>
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
<!-- end modal Tambah Station -->

<!-- modal Ubah Station -->
<div class="modal fade" id="ubahStationModal" tabindex="0" role="dialog" aria-labelledby="ubahStationModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Station</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="{{action("adminController\KelolaStationController@ubah")}}" method="post">
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
<!-- end Ubah Station -->

<!-- modal Hapus Station -->
<div class="modal fade" id="hapusStationModal" tab-index="-1" role="dialog" aria-labeledby="hapusStationModalLabel">
  <div class="modal-dialog modal-sm" role="alertdialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="gridSystemModalLabel">Yakin hapus?</h4>
      </div>

      <div class="modal-footer">
        <a role="button" type="button" class="btn btn-danger" href="{{action("adminController\KelolaStationController@hapus")}}">Hapus</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal Hapus Station -->

@stop
