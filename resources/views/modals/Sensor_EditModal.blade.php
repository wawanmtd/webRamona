<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Sensor : {{$sensoredit->FieldName}}</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="kelolaSensor/ubah/{{$sensoredit->Sensor_ID}}" method="post">
          <div class="box-body">

            <div class="form-group">
              <label for="Sensor">Sensor Type</label>
              <input type="text" name="SensorType_ID" class="form-control"  placeholder="SensorType_ID" value="{{$sensoredit->SensorType_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Field Name</label>
              <input type="text" name="FieldName" class="form-control"  placeholder="FieldName" value="{{$sensoredit->FieldName}}" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" value="{{$sensoredit->Description}}" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" value="{{$sensoredit->Member_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Sensor">MarkerType_ID (option)</label>
              <input type="text" name="MarkerType_ID" class="form-control"  placeholder="MarkerType_ID" value="{{$sensoredit->MarkerType_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Sensor">DocumentType_ID (option)</label>
              <input type="text" name="DocumentType_ID" class="form-control"  placeholder="DocumentType_ID" value="{{$sensoredit->DocumentType_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Sensor">SensorMarker</label>
              <input type="text" name="SensorMarker" class="form-control"  placeholder="SensorMarker"  required>
            </div>

            <div class="form-group">
              <label for="Sensor">SensorDocument</label>
              <input type="text" name="SensorDocument" class="form-control"  placeholder="SensorDocument" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Device_ID</label>
              <input type="text" name="Device_ID" class="form-control"  placeholder="Device_ID" value="{{$sensoredit->DeviceSensorData->Device_ID}}" required>
            </div>

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="PUT">
            <div class="modal-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>