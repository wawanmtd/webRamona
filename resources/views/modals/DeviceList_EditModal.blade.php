<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ubah Device : {{$devicelistedit->SerialNumber}}</h4>
      </div>

      <div class="modal-body ">
        <form role="form" action="kelolaDeviceList/ubah/{{$devicelistedit->DeviceList_ID}}" method="post">
          <div class="box-body">

             <div class="form-group">
              <label for="Device">Device ID</label>
              <input type="text" name="Device_ID" class="form-control"  placeholder="Device_ID" value="{{$devicelistedit->Device_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Station ID</label>
              <input type="text" name="Station_ID" class="form-control"  placeholder="Station_ID" value="{{$devicelistedit->DeviceInStationData->Station_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Altitude</label>
              <input type="text" name="Altitude" class="form-control"  placeholder="Altitude" value="{{$devicelistedit->DeviceInStationData->Altitude}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Serial Number</label>
              <input type="text" name="SerialNumber" class="form-control"  placeholder="SerialNumber" value="{{$devicelistedit->SerialNumber}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Manufacture Date</label>
              <input type="Date" name="ManufactureDate" class="form-control"  placeholder="ManufactureDate" value="{{$devicelistedit->ManufactureDate}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Purchase Date</label>
              <input type="Date" name="PurchaseDate" class="form-control"  placeholder="PurchaseDate" value="{{$devicelistedit->PurchaseDate}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Supplier ID</label>
              <input type="text" name="Supplier_ID" class="form-control"  placeholder="Supplier_ID" value="{{$devicelistedit->Supplier_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">DeviceStatus ID</label>
              <input type="text" name="DeviceStatus_ID" class="form-control"  placeholder="DeviceStatus_ID" value="{{$devicelistedit->DeviceStatus_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Sales ID</label>
              <input type="text" name="Sales_ID" class="form-control"  placeholder="Sales_ID" value="{{$devicelistedit->Sales_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Support ID</label>
              <input type="text" name="Support_ID" class="form-control"  placeholder="Support_ID" value="{{$devicelistedit->Support_ID}}" required>
            </div>


            <div class="form-group">
              <label for="Device">Remark</label>
              <input type="text" name="Remark" class="form-control"  placeholder="Remark" value="{{$devicelistedit->Remark}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Member_ID</label>
              <input type="text" name="Member_ID" class="form-control"  placeholder="Member_ID" value="{{$devicelistedit->Member_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Picture ID</label>
              <input type="text" name="Pic_ID" class="form-control"  placeholder="Pic_ID" value="{{$devicelistedit->Pic_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">Picture Type ID</label>
              <input type="text" name="PictureType_ID" class="form-control"  placeholder="PictureType_ID" value="{{$devicelistedit->PictureType_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">DeviceList Picture</label>
              <input type="text" name="DeviceListPicture" class="form-control"  placeholder="DeviceListPicture" required>
            </div>

            <div class="form-group">
              <label for="Device">DocumentType_ID</label>
              <input type="text" name="DocumentType_ID" class="form-control"  placeholder="DocumentType_ID" value="{{$devicelistedit->DocumentType_ID}}" required>
            </div>

            <div class="form-group">
              <label for="Device">DeviceList Document</label>
              <input type="text" name="DeviceListDocument" class="form-control"  placeholder="DeviceListDocument" required>
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