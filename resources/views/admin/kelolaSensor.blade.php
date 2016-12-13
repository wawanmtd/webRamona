@extends('admin.index')

@section('content-header')
  Kelola Sensor
  <small>Tambah Sensor</small>
@stop

@section('konten')


<!-- Table Data Sensor -->
<div class="row">
  <div class="col-xs-12">


<div class="box">
  <div class="box-header">
    <button type="button" action="#tambah" data-toggle="modal" data-target="#tambahSensorModal" class="btn btn-success">
      <span class="fa fa-plus"></span> Tambah</button>
  </div>

  <div class="box-body">
    <table id="tableSensor" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Field Name</th>
          <th>Sensor Name</th>
          <th>Value Count</th>
          <th>Member</th>
          <th>Device</th>
          <th>Action</th>
        </tr>
      </thead>

      <tbody>
      @foreach ($SensorShow as $sensorshow)
        <tr>
          <td></td>
          <td><strong>{{$sensorshow->FieldName}}</strong></td>
          <td>{{$sensorshow->SensorTypeData->SensorTypeName}}</td>
          <td>{{$sensorshow->ValueCount}}</td>
          <td>{{$sensorshow->MemberData->PersonData->PersonName}} ({{$sensorshow->MemberData->MemberRoleData->NameRole}})
          </td>
          <!-- sementara, belongstomany belum berhasil -->
          <td>{{$sensorshow->DeviceSensorData->DeviceData->DeviceModel}}</td>
          <td style="width:11%">
            <button class="btn btn-info" onclick="getData_Edit({{$sensorshow->Sensor_ID}})"><span class="fa fa-edit"></span></button>
            <button class="btn btn-danger" onclick="getData_Delete({{$sensorshow->Sensor_ID}})"><span class="fa fa-trash"></span></button>
          </td>
        </tr>
        @endforeach

      </tbody>

      <tfoot >
        <tr>
          <th>No</th>
          <th>Field Name</th>
          <th>Sensor Name</th>
          <th>Value Count</th>
          <th>Member</th>
          <th>Device</th>
          <th>Action</th>

        </tr>
      </tfoot>
    </table>
  </div>
  </div>
  </div>
</div>
<!-- end Table Data Sensor -->
<script>
  $(function () {
    $("#tableSensor").DataTable();
  });
</script>
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
              <label for="Device">Device Type</label>
              <select class="form-control" name="Device_ID">
              @foreach ($device as $do)
                <option value="{{$do->Device_ID}}">{{$do->DeviceModel}} ({{$do->Description}})</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Sensor">Sensor Type</label>
              <select class="form-control" name="SensorType_ID">
                @foreach ($sensortype as $so)
                <option value="{{$so->SensorType_ID}}">{{$so->SensorTypeName}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Sensor">Field Name</label>
              <input type="text" name="FieldName" class="form-control"  placeholder="FieldName" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" required>
            </div>

            <!-- <div class="form-group">
              <label for="Sensor">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" required>
            </div> -->

            <div class="form-group">
              <label for="Station">Marker Type</label>
              <select class="form-control" name="MarkerType_ID">
              @foreach($markertype as $mto)
                <option value="{{$mto->MarkerType_ID}}">{{$mto->MarkerTypeName}}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Station">Document Type</label>
              <select class="form-control" name="DocumentType_ID">
              @foreach($documenttype as $dto)
                <option value="{{$dto->DocumentType_ID}}">{{$dto->DocumentTypeName}}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Sensor">SensorMarker</label>
              <input type="text" name="SensorMarker" class="form-control"  placeholder="SensorMarker" required>
            </div>

            <div class="form-group">
              <label for="Sensor">SensorDocument</label>
              <input type="text" name="SensorDocument" class="form-control"  placeholder="SensorDocument" required>
            </div>

            <input type="hidden" name="Member_ID" value="{{Session::get('Member_ID')}}">
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

<!-- modal Ubah Sensor 
    //changed.
 end Ubah Sensor -->

<!-- modal Hapus Sensor -->
<div class="modal fade" id="hapusSensorModal" tab-index="-1" role="dialog" aria-labeledby="hapusSensorModalLabel">
  <!-- some content. -->
</div>
<!-- end modal Hapus Sensor -->

<script>
  function getData_Edit(id){
    $.ajax({
      url: 'kelolaSensor/editmodal/'+id,
      dataType: 'html',
      cache:false
    }).done(function(modalContent){
      $('#hapusSensorModal').modal('show');
      $('#hapusSensorModal').html(modalContent);
    });
  }

  function getData_Delete(id){
    $.ajax({
      url: 'kelolaSensor/hapusmodal/'+id,
      dataType: 'html',
      cache:false
    }).done(function(modalContent){
      $('#hapusSensorModal').modal('show');
      $('#hapusSensorModal').html(modalContent);
    });
  }
</script>
@stop
