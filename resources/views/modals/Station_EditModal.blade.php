<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Station : {{$stationedit->StationName}}</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="kelolaStation/ubah/{{$stationedit->Station_ID}}" method="post">
          <div class="box-body">

            <div class="form-group">
              <label for="Station">Area</label>
              <select class="form-control" name="Area_ID">
              @foreach($area as $ao)
                <option value="{{$ao->Area_ID}}" @if($ao->Area_ID == $stationedit->StationAreaData->Area_ID) selected @endif>{{$ao->AreaName}}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Station">Station Type</label>
              <select class="form-control" name="StationType_ID">
              @foreach ($stationtype as $sto)
                <option value="{{$sto->StationType_ID}}" @if($sto->StationType_ID == $stationedit->StationType_ID) selected @endif>{{$sto->Description}}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Station">Location</label>
              <input type="text" name="Location" class="form-control"  placeholder="Location" value="{{$stationedit->Location}}" required>
            </div>

            <div class="form-group">
              <label for="Station">Station Name</label>
              <input type="text" name="StationName" class="form-control"  placeholder="StationName" value="{{$stationedit->StationName}}" required>
            </div>

            <div class="form-group">
              <label for="Station">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" value="{{$stationedit->Description}}" required>
            </div>

            <div class="form-group">
              <label for="Station">Address</label>
              <input type="text" name="Address" class="form-control"  placeholder="Address" value="{{$stationedit->Address}}" required>
            </div>

            <div class="form-group">
              <label for="Station">City</label>
              <input type="text" name="City" class="form-control"  placeholder="City" value="{{$stationedit->City}}" required>
            </div>

            <div class="form-group">
                <label for="Country_ID">Country</label>
                <select class="form-control" name="Country_ID" id="country_id" required>
                @foreach ($country as $co)
                  <option value="{{$co->Country_ID}}" @if($co->Country_ID == $stationedit->COuntry_ID) selected @endif>{{$co->CountryName}}</option>
                @endforeach
                </select>
              </div>

            <div class="form-group">
              <label for="Station">Power Source</label>
              <input type="text" name="PowerSource" class="form-control"  placeholder="PowerSource" value="{{$stationedit->PowerSource}}" required>
            </div>

            <div class="form-group">
              <label for="Station">Installation Date</label>
              <input type="Date" name="InstallationDate" class="form-control"  placeholder="InstallationDate" value="{{$stationedit->InstallationDate}}" required>
            </div>

            <div class="form-group">
              <label for="Station">Member</label>
              <select class="form-control" name="Member_ID">
              @foreach($member as $mo)
                <option value="{{$mo->Member_ID}}" @if($mo->Member_ID == $stationedit->Member_ID) selected @endif>{{$mo->MemberRoleData->NameRole}} - {{$mo->PersonData->PersonName}} ({{$mo->Username}})</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Station">Marker Type</label>
              <select class="form-control" name="MarkerType_ID">
              @foreach($markertype as $mto)
                <option value="{{$mto->MarkerType_ID}}" @if($mto->MarkerType_ID == $stationedit->MarkerType_ID) selected @endif>{{$mto->MarkerTypeName}}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="Station">Document Type</label>
              <select class="form-control" name="DocumentType_ID">
              @foreach($documenttype as $dto)
                <option value="{{$dto->DocumentType_ID}}"  @if($dto->DocumentType_ID == $stationedit->DocumentType_ID) selected @endif >{{$dto->DocumentTypeName}}</option>
              @endforeach
              </select>
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
            <input type="hidden" name="_method" value="PUT">
            <div class="modal-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>