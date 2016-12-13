  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Device : {{$deviceedit->DeviceModel}}</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="kelolaDevice/ubah/{{$deviceedit->Device_ID}}" method="post">
          <div class="box-body">

             <div class="form-group">
              <label for="Device">Device Model</label>
              <input type="text" name="DeviceModel" class="form-control"  placeholder="DeviceModel" value="{{$deviceedit->DeviceModel}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Manufacturer ID</label>
              <input type="text" name="Manufacturer_ID" class="form-control"  placeholder="Manufacturer_ID" value="{{$deviceedit->Manufacturer_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" value="{{$deviceedit->Description}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Sensor Count</label>
              <input type="text" name="SensorCount" class="form-control"  placeholder="SensorCount" value="{{$deviceedit->SensorCount}}" required>
            </div>

            <div class="form-group">
            <label for="Country_ID">Country</label>
            <select class="form-control" name="Country_ID" id="country_id" required>
            @foreach ($country as $co)
              <option value="{{$co->Country_ID}}"
                @if($co->Country_ID == $deviceedit->Country_ID) 
                  selected
                @endif>
                {{$co->CountryName}}
              </option>
            @endforeach
            </select>
          </div>

            <div class="form-group">
              <label for="Device">Remark</label>
              <input type="text" name="Remark" class="form-control"  placeholder="Remark" value="{{$deviceedit->Remark}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Voltage Range</label>
              <input type="text" name="VoltageRange" class="form-control"  placeholder="VoltageRange" value="{{$deviceedit->VoltageRange}}" required>
            </div>

            <!-- <div class="form-group">
              <label for="Device">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" value="{{$deviceedit->Member_ID}}" required>
            </div> -->

            <div class="form-group">
              <label for="Station">Document Type</label>
              <select class="form-control" name="DocumentType_ID">
              @foreach($documenttype as $dto)
                <option value="{{$dto->DocumentType_ID}}"  @if($dto->DocumentType_ID == $deviceedit->DocumentType_ID) selected @endif >{{$dto->DocumentTypeName}}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Device">Device Document</label>
              <input type="text" name="DeviceDocument" class="form-control"  placeholder="DeviceDocument" required>
            </div>

            <input type="hidden" name="Member_ID" value="{{Session::get('Member_ID')}}">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="modal-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>