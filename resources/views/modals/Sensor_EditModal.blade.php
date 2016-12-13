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
              <label for="Device">Device Type</label>
              <select class="form-control" name="Device_ID">
              @foreach ($device as $do)
                <option value="{{$do->Device_ID}}" @if($do->Device_ID == $sensoredit->DeviceSensorData->Device_ID) selected @endif>{{$do->DeviceModel}} ({{$do->Description}})</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Sensor">Sensor Type</label>
              <select class="form-control" name="SensorType_ID">
                @foreach ($sensortype as $so)
                <option value="{{$so->SensorType_ID}}" @if($so->SensorType_ID == $sensoredit->SensorType_ID) selected @endif>{{$so->SensorTypeName}}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Sensor">Field Name</label>
              <input type="text" name="FieldName" class="form-control"  placeholder="FieldName" value="{{$sensoredit->FieldName}}" required>
            </div>

            <div class="form-group">
              <label for="Sensor">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" value="{{$sensoredit->Description}}" required>
            </div>

            <!-- <div class="form-group">
              <label for="Sensor">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" value="{{$sensoredit->Member_ID}}" required>
            </div> -->

            <div class="form-group">
              <label for="Station">Marker Type</label>
              <select class="form-control" name="MarkerType_ID">
              @foreach($markertype as $mto)
                <option value="{{$mto->MarkerType_ID}}" @if($mto->MarkerType_ID == $sensoredit->MarkerType_ID) selected @endif>{{$mto->MarkerTypeName}}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Station">Document Type</label>
              <select class="form-control" name="DocumentType_ID">
              @foreach($documenttype as $dto)
                <option value="{{$dto->DocumentType_ID}}" @if($dto->DocumentType_ID == $sensoredit->DocumentType_ID) selected @endif>{{$dto->DocumentTypeName}}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Sensor">SensorMarker</label>
              <input type="text" name="SensorMarker" class="form-control"  placeholder="SensorMarker"  required>
            </div>

            <div class="form-group">
              <label for="Sensor">SensorDocument</label>
              <input type="text" name="SensorDocument" class="form-control"  placeholder="SensorDocument" required>
            </div>

            <input type="hidden" name="Member_ID" value="{{Session::get('Member_ID')}}">
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