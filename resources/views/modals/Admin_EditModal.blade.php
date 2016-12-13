<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Ubah Admin : {{$admineditmodal->PersonData->PersonName}}</h4>
    </div>

    <div class="modal-body ">
      <form role="form" action="kelolaAdmin/ubah/{{$admineditmodal->Member_ID}}" method="post">
        <div class="box-body">
          
          <div class="form-group">
            <label for="FullName">Full Name</label>
            <input type="text" value="{{$admineditmodal->Persondata->PersonName}}" data-fullname="" name="PersonName" class="form-control personname" placeholder="Full Name" required>
          </div>

          <div class="form-group">
            <label for="Nickname">Nickname</label>
            <input type="text" name="Nickname" class="form-control nickname" placeholder="Nickname" value="{{$admineditmodal->Persondata->Nickname}}" required>
          </div>

          <div class="form-group">
            <label for="Address">Address</label>
            <input type="text" name="Address" class="form-control" placeholder="Address" value="{{$admineditmodal->Persondata->Address}}" required>
          </div>

          <div class="form-group">
            <label for="City">City</label>
            <input type="text" name="City" class="form-control" placeholder="City" value="{{$admineditmodal->Persondata->City}}" required>
          </div>

          <!-- //option dari database -->
          <div class="form-group">
            <label for="Country_ID">Country</label>
            <select class="form-control" name="Country_ID" id="country_id" required>
            @foreach ($country as $co)
              <option value="{{$co->Country_ID}}"
                @if($co->Country_ID == $admineditmodal->Persondata->Country_ID) 
                  selected
                @endif>
                {{$co->CountryName}}
              </option>
            @endforeach
            </select>
          </div>

          <div class="form-group">
                <label for="BlobType_ID">Picture Type</label>
                <select class="form-control" name="BlobType_ID" id="blobtype_id" required>
                @foreach ($blob as $bo)
                  <option value="{{$bo->BlobType_ID}}" @if($bo->BlobType_ID == $admineditmodal->PersonData->BlobType_ID) 
                  selected
                @endif >{{$bo->TypeName}}</option>
                @endforeach
                </select>
              </div>
          

          <div class="form-group">
            <label for="Picture">Picture (upload*)</label>
            <input type="text" name="PersonPicture" class="form-control" placeholder="PersonPicture" required>
          </div>

          <div class="form-group">
            <label for="ContactType_ID">Contact Type</label>
            <select class="form-control" name="ContactType_ID" id="Contacttype_id" required>
              @foreach($contact as $co)
              <option value="{{$co->ContactType_ID}}" @if($co->ContactType_ID == $admineditmodal->PersonData->PersonContactData->ContactType_ID) selected @endif>
              {{$co->ContactName}}</option>
              @endforeach
            </select>
          </div>              

          <div class="form-group">
            <label for="ContactValue">Contact Value</label>
            <input type="text" name="ContactValue" class="form-control"  placeholder="Enter Contact Value" value="{{$admineditmodal->Persondata->PersonContactData->ContactValue}}" required>
          </div>

          <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" name="Username" class="form-control"  placeholder="Username" value="{{$admineditmodal->Username}}" required>
          </div>

          <div class="form-group">
            <label for="AccessCode">Password</label>
            <input type="password" name="AccessCode" class="form-control" placeholder="Password" value="{{$admineditmodal->AccessCode}}" required>
          </div>

          <div class="form-group">
                <label for="MemberRole_ID">Member Role</label>
                <select class="form-control" name="MemberRole_ID" id="memberrole_id" required>
                @foreach($memberrole as $mro)
                  <option value="{{$mro->MemberRole_ID}}" @if($mro->MemberRole_ID == $admineditmodal->MemberRole_ID) selected @endif>{{$mro->NameRole}}</option>
                @endforeach
                </select>
              </div>

          <div class="form-group">
            <label for="Remark">Remark</label>
            <input type="text" name="Remark" class="form-control" placeholder="Remark" value="{{$admineditmodal->Remark}}" required>
          </div>

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