@extends('admin.index')

@section('content-header')
  Kelola Sensor
  <small>Tambah Sensor</small>
@stop

@section('konten')
<button type="button" action="#tambah" data-toggle="modal" data-target="#tambahSensorModal" class="btn btn-success">
  <span class="fa fa-plus"></span> Tambah</button>

<!-- Table Data Sensor -->
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Daftar Sensor</h3>
  </div>

  <div class="box-body">
    <table id="tableSensor" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Field Name</th>
          <th>Sensor Name</th>
          <th>Value Count</th>
          <th>Member</th>
          <th>Device</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>

      <tbody>
      @foreach ($SensorShow as $sensorshow)
        <tr>
          <td>{{$sensorshow->FieldName}}</td>
          <td>{{$sensorshow->SensorTypeData->SensorTypeName}}</td>
          <td>{{$sensorshow->ValueCount}}</td>
          <td>{{$sensorshow->MemberData->PersonData->PersonName}}
          </td>
          <!-- sementara, belongstomany belum berhasil -->
          <td>{{$sensorshow->DeviceSensorData->DeviceData->DeviceModel}}</td>
          <td style="width:5%">
            <button type="button" action="#ubah" data-toggle="modal" data-target="#ubahSensorModal" class="btn btn-info">
              <span class="fa fa-edit"></span></button>
          </td>
          <td style="width:5%">
            <button type="button" action="#hapus" data-toggle="modal" data-target="#hapusSensorModal" class="btn btn-danger">
              <span class="fa fa-trash"></span></button>
          </td>
        </tr>

        @endforeach

      </tbody>

      <tfoot >
        <tr>
          <th>Field Name</th>
          <th>Sensor Name</th>
          <th>Value Count</th>
          <th>Member</th>
          <th>Device</th>
          <th colspan="2">Action</th>

        </tr>
      </tfoot>
    </table>

  </div>
</div>
<!-- end Table Data Sensor -->

<!-- modal Tambah Sensor -->
<div class="modal fade" id="tambahSensorModal" tabindex="-1" role="dialog" aria-labelledby="tambahSensorModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Sensor</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="kelolaSensor/tambahSensor" method="post">
          <div class="box-body">
            
            <div class="form-group">
              <label for="Sensor">Sensor Type</label>
              <input type="text" name="SensorType_ID" class="form-control"  placeholder="SensorType_ID" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Field Name</label>
              <input type="text" name="FieldName" class="form-control"  placeholder="FieldName" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" required>
            </div>

            <div class="form-group">
              <label for="Sensor">MarkerType_ID (option)</label>
              <input type="text" name="MarkerType_ID" class="form-control"  placeholder="MarkerType_ID" required>
            </div>

            <div class="form-group">
              <label for="Sensor">DocumentType_ID (option)</label>
              <input type="text" name="DocumentType_ID" class="form-control"  placeholder="DocumentType_ID" required>
            </div>

            <div class="form-group">
              <label for="Sensor">SensorMarker</label>
              <input type="text" name="SensorMarker" class="form-control"  placeholder="SensorMarker" required>
            </div>

            <div class="form-group">
              <label for="Sensor">SensorDocument</label>
              <input type="text" name="SensorDocument" class="form-control"  placeholder="SensorDocument" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Device_ID</label>
              <input type="text" name="Device_ID" class="form-control"  placeholder="Device_ID" required>
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
<!-- end modal Tambah Sensor -->

<!-- modal Ubah Sensor -->
<div class="modal fade" id="ubahSensorModal" tabindex="0" role="dialog" aria-labelledby="ubahSensorModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Sensor</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="{{action("adminController\KelolaSensorController@ubah")}}" method="post">
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
<!-- end Ubah Sensor -->

<!-- modal Hapus Sensor -->
<div class="modal fade" id="hapusSensorModal" tab-index="-1" role="dialog" aria-labeledby="hapusSensorModalLabel">
  <div class="modal-dialog modal-sm" role="alertdialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="gridSystemModalLabel">Yakin hapus?</h4>
      </div>

      <div class="modal-footer">
        <a role="button" type="button" class="btn btn-danger" href="{{action("adminController\KelolaSensorController@hapus")}}">Hapus</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>
    </div>
  </div>
</div>
<!-- end modal Hapus Sensor -->

@stop
