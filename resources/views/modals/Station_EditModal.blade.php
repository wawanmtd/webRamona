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
              <label for="Station">Area_ID</label>
              <input type="text" name="Area_ID" class="form-control"  placeholder="Area_ID" value="{{$stationedit->StationAreaData->Area_ID}}" required>
            </div>

             <div class="form-group">
              <label for="Station">StationType_ID</label>
              <input type="text" name="StationType_ID" class="form-control"  placeholder="StationType_ID" value="{{$stationedit->StationType_ID}}" required>
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
              <label for="Station">Country_ID</label>
              <input type="text" name="Country_ID" class="form-control"  placeholder="Country_ID" value="{{$stationedit->Country_ID}}" required>
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
              <label for="Station">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" value="{{$stationedit->Member_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Station">MarkerType_ID</label>
              <input type="text" name="MarkerType_ID" class="form-control"  placeholder="MarkerType_ID" value="{{$stationedit->MarkerType_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Station">DocumentType_ID</label>
              <input type="text" name="DocumentType_ID" class="form-control"  placeholder="DocumentType_ID" value="{{$stationedit->DocumentType_ID}}" required>
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