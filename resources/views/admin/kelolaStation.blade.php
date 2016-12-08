@extends('admin.index')

@section('content-header')
  Kelola Station
  <small>Tambah Station</small>
@stop

@section('konten')
<!-- Table Data Station -->
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <button type="button" action="#tambah" data-toggle="modal" data-target="#tambahStationModal" class="btn btn-success">
          <span class="fa fa-plus"></span> Tambah</button>
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
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
          @foreach ($ShowStation as $showstation)
            <tr>
              <td>{{$showstation->StationName}}</td>
              <td>{{$showstation->StationTypeData->Description}}</td>
              <td>{{$showstation->Address}}</td>
              <td>{{$showstation->StationAreaData->AreaData->AreaName}}</td>
              <th>{{$showstation->MemberData->PersonData->PersonName}}</th>
              <td>{{$showstation->InstallationDate}}</td>
              <td style="width:10%">
                <button class="btn btn-info" onclick="getData_Edit({{$showstation->Station_ID}})"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger" onclick="getData_Delete({{$showstation->Station_ID}})"><span class="fa fa-trash"></span></button>
              </td>
            </tr>
            @endforeach


          </tbody>

          <tfoot>
            <tr>
              <th>Station Name</th>
              <th>Station Type</th>
              <th>Address</th>
              <th>Area</th>
              <th>Member</th>
              <th>Installation Date</th>
              <th>Action</th>

            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- end Table Data Station -->
<script>
  $(function () {
    $("#tableStation").DataTable();
  });
</script>
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

<!-- modal Ubah Station 
    //changed.
 end Ubah Station -->

<!-- modal Hapus Station -->
<div class="modal fade" id="hapusStationModal" tab-index="-1" role="dialog" aria-labeledby="hapusStationModalLabel">
  <!-- some content. -->
</div>
<!-- end modal Hapus Station -->

<script>
  function getData_Edit(id){
    $.ajax({
      url: 'kelolaStation/editmodal/'+id,
      dataType: 'html',
      cache:false
    }).done(function(modalContent){
      $('#hapusStationModal').modal('show');
      $('#hapusStationModal').html(modalContent);
    });
  }

  function getData_Delete(id){
    $.ajax({
      url: 'kelolaStation/hapusmodal/'+id,
      dataType: 'html',
      cache:false
    }).done(function(modalContent){
      $('#hapusStationModal').modal('show');
      $('#hapusStationModal').html(modalContent);
    });
  }
</script>
@stop
