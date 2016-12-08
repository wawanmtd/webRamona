@extends('admin.index')

@section('content-header')
  Kelola Device
  <small>Tambah Device List</small>
@stop

@section('konten')
<!-- Table Data Device -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <button type="button" action="#tambah" data-toggle="modal" data-target="#tambahDeviceModal" class="btn btn-success">
          <span class="fa fa-plus"></span> Tambah</button>
      </div>

      <div class="box-body">
        <table id="tableDevice" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Device Model</th>
              <th>Serial Number</th>
              <th>Purchase Date</th>
              <th>Device Status</th>
              <th>Station</th>
              <th>Member</th>
            </tr>
          </thead>

          <tbody>
          @foreach ($DeviceListShow as $devicelistshow)
            <tr>
              <td>{{$devicelistshow->DeviceData->DeviceModel}}</td>
              <td>{{$devicelistshow->SerialNumber}}</td>
              <td>{{$devicelistshow->PurchaseDate}}</td>
              <td>{{$devicelistshow->DeviceStatus_ID}}</td>
              <th>{{$devicelistshow->DeviceInStationData->StationName}}</th>
              <td>{{$devicelistshow->MemberData->PersonData->PersonName}}</td>
              <td style="width:10%">
                <button class="btn btn-info" onclick="getData_Edit({{$devicelistshow->Device_ID}})"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" onclick="getData_Delete({{$devicelistshow->Device_ID}})"><span class="fa fa-trash"></span></button>
              </td>
            </tr>

            @endforeach

          </tbody>

          <tfoot >
            <tr>
              <th>Device Model</th>
              <th>Serial Number</th>
              <th>Purchase Date</th>
              <th>Device Status</th>
              <th>Station</th>
              <th>Member</th>
            </tr>
          </tfoot>
        </table>

      </div>
    </div>
  </div>
</div>
<!-- end Table Data Device -->

<script>
  $(function () {
    $("#tableDevice").DataTable();
  });
</script>
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
              <label for="Device">Device Model</label>
              <input type="text" name="DeviceModel" class="form-control"  placeholder="DeviceModel" required>
            </div>

            <div class="form-group">
              <label for="Device">Manufacturer ID</label>
              <input type="text" name="Manufacturer_ID" class="form-control"  placeholder="Manufacturer_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" required>
            </div>

            <div class="form-group">
              <label for="Device">Sensor Count</label>
              <input type="text" name="SensorCount" class="form-control"  placeholder="SensorCount" required>
            </div>

            <div class="form-group">
              <label for="Device">Country_ID</label>
              <input type="text" name="Country_ID" class="form-control"  placeholder="Country_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Remark</label>
              <input type="text" name="Remark" class="form-control"  placeholder="Remark" required>
            </div>

            <div class="form-group">
              <label for="Device">Voltage Range</label>
              <input type="text" name="VoltageRange" class="form-control"  placeholder="VoltageRange" required>
            </div>

            <div class="form-group">
              <label for="Device">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">DocumentType_ID</label>
              <input type="text" name="DocumentType_ID" class="form-control"  placeholder="DocumentType_ID" required>
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

<!-- modal Ubah Device 
    //changed.
 end Ubah Device -->

<!-- modal Hapus Device -->
<div class="modal fade" id="hapusDeviceModal" tab-index="-1" role="dialog" aria-labeledby="hapusDeviceModalLabel">
  <!-- some content. -->
</div>
<!-- end modal Hapus Device -->

<script>
  function getData_Edit(id){
    $.ajax({
      url: 'kelolaDevice/editmodal/'+id,
      dataType: 'html',
      cache:false
    }).done(function(modalContent){
      $('#hapusDeviceModal').modal('show');
      $('#hapusDeviceModal').html(modalContent);
    });
  }

  function getData_Delete(id){
    $.ajax({
      url: 'kelolaDevice/hapusmodal/'+id,
      dataType: 'html',
      cache:false
    }).done(function(modalContent){
      $('#hapusDeviceModal').modal('show');
      $('#hapusDeviceModal').html(modalContent);
    });
  }

</script>
@stop
