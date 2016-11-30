<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Ubah Admin</h4>
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

              <div class="form-group">
                <label for="Country_ID">Country ID (harusnya pake option sih)</label>
                <input type="text" name="Country_ID" class="form-control" placeholder="Country" value="{{$admineditmodal->Persondata->Country_ID}}" required>
              </div>

              <div class="form-group">
                <label for="BlobType_ID">BlobType_ID (ini juga option ceritanya)</label>
                <input type="text" name="BlobType_ID" class="form-control" placeholder="BlobType_ID" value="{{$admineditmodal->Persondata->BlobType_ID}}" required>
              </div>

              <div class="form-group">
                <label for="Picture">Picture (upload*)</label>
                <input type="text" name="PersonPicture" class="form-control" placeholder="PersonPicture" required>
              </div>

              <div class="form-group">
                <label for="ContactType_ID">ContactType_ID (ini juga option ceritanya)</label>
                <input type="text" name="ContactType_ID" class="form-control" placeholder="ContactType_ID" value="{{$admineditmodal->Persondata->PersonContactData->ContactType_ID}}" required>
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
                <label for="MemberRole_ID">MemberRole_ID (ini juga option ceritanya)</label>
                <input type="text" name="MemberRole_ID" class="form-control" placeholder="MemberRole_ID" value="{{$admineditmodal->MemberRole_ID}}" required>
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