<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Area</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="kelolaArea/ubah/{{$areaeditmodal->Area_ID}}" method="post">
          <div class="box-body">

             <div class="form-group">
              <label for="AreaName">Area Name</label>
              <input type="text" name="AreaName" class="form-control"  placeholder="Area Name" value="{{$areaeditmodal->AreaName}}" required>
            </div>

            <div class="form-group">
              <label for="Description">Description</label>
              <input type="text" name="Description" class="form-control"  placeholder="Description" value="{{$areaeditmodal->Description}}" required>
            </div>

            <div class="form-group">
              <label for="Remark">Remark</label>
              <input type="text" name="Remark" class="form-control"  placeholder="Remark" value="{{$areaeditmodal->Remark}}" required>
            </div>

            <div class="form-group">
              <label for="Country_ID">Country ID (bentuk option)</label>
              <input type="text" name="Country_ID" class="form-control"  placeholder="Country_ID" value="{{$areaeditmodal->Country_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Member_ID">Member_ID (bentuk option)</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" value="{{$areaeditmodal->Member_ID}}" required>
            </div>
          	<input type="hidden" name="_token" value="{{csrf_token()}}">
          	<input type="hidden" name="_method" value="PUT">
            <div class="modal-footer">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
            </div>
          </div>
        </form>
      </div>

      
