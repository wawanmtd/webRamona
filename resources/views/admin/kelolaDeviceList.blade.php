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
              <th>{{$devicelistshow->DeviceInStationData->StationData->StationName}}</th>
              <td>{{$devicelistshow->MemberData->PersonData->PersonName}}</td>
              <td style="width:10%">
                <button class="btn btn-info" onclick="getData_Edit({{$devicelistshow->DeviceList_ID}})"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" onclick="getData_Delete({{$devicelistshow->DeviceList_ID}})"><span class="fa fa-trash"></span></button>
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
        <form role="form" action="kelolaDeviceList/tambahDeviceList" method="post">
          <div class="box-body">

             <div class="form-group">
              <label for="Device">Device ID</label>
              <input type="text" name="Device_ID" class="form-control"  placeholder="Device_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Station ID</label>
              <input type="text" name="Station_ID" class="form-control"  placeholder="Station_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Altitude</label>
              <input type="text" name="Altitude" class="form-control"  placeholder="Altitude" required>
            </div>

            <div class="form-group">
              <label for="Device">Serial Number</label>
              <input type="text" name="SerialNumber" class="form-control"  placeholder="SerialNumber" required>
            </div>

            <div class="form-group">
              <label for="Device">Manufacture Date</label>
              <input type="Date" name="ManufactureDate" class="form-control"  placeholder="ManufactureDate" required>
            </div>

            <div class="form-group">
              <label for="Device">Purchase Date</label>
              <input type="Date" name="PurchaseDate" class="form-control"  placeholder="PurchaseDate" required>
            </div>

            <div class="form-group">
              <label for="Device">Supplier ID</label>
              <input type="text" name="Supplier_ID" class="form-control"  placeholder="Supplier_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">DeviceStatus ID</label>
              <input type="text" name="DeviceStatus_ID" class="form-control"  placeholder="DeviceStatus_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Sales ID</label>
              <input type="text" name="Sales_ID" class="form-control"  placeholder="Sales_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Support ID</label>
              <input type="text" name="Support_ID" class="form-control"  placeholder="Support_ID" required>
            </div>


            <div class="form-group">
              <label for="Device">Remark</label>
              <input type="text" name="Remark" class="form-control"  placeholder="Remark" required>
            </div>

            <div class="form-group">
              <label for="Device">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Picture ID</label>
              <input type="text" name="Pic_ID" class="form-control"  placeholder="Pic_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">Picture Type ID</label>
              <input type="text" name="PictureType_ID" class="form-control"  placeholder="PictureType_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">DeviceList Picture</label>
              <input type="text" name="DeviceListPicture" class="form-control"  placeholder="DeviceListPicture" required>
            </div>

            <div class="form-group">
              <label for="Device">DocumentType_ID</label>
              <input type="text" name="DocumentType_ID" class="form-control"  placeholder="DocumentType_ID" required>
            </div>

            <div class="form-group">
              <label for="Device">DeviceList Document</label>
              <input type="text" name="DeviceListDocument" class="form-control"  placeholder="DeviceListDocument" required>
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
<div class="modal fade" id="hapusDeviceListModal" tab-index="-1" role="dialog" aria-labeledby="hapusDeviceListModalLabel">
  <!-- some content. -->
</div>
<!-- end modal Hapus Device -->

<script>
  function getData_Edit(id){
    $.ajax({
      url: 'kelolaDeviceList/editmodal/'+id,
      dataType: 'html',
      cache:false
    }).done(function(modalContent){
      $('#hapusDeviceListModal').modal('show');
      $('#hapusDeviceListModal').html(modalContent);
    });
  }

  function getData_Delete(id){
    $.ajax({
      url: 'kelolaDeviceList/hapusmodal/'+id,
      dataType: 'html',
      cache:false
    }).done(function(modalContent){
      $('#hapusDeviceListModal').modal('show');
      $('#hapusDeviceListModal').html(modalContent);
    });
  }

</script>
@stop


<!-- kenapa edit/hapus, pakenya hapus modal? itu cuma buat manggil div nya aja, ga mesti hapus modal sih -->