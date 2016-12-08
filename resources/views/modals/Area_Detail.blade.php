<div class="modal-dialog modal-sm" role="document" >
  <div class="modal-content tambahareaa" style="text-align: center;">
      <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Detail Area</h4>
      </div>

      <div class="modal-body ">
         <table id="tableAdmin" class="table table-bordered table-striped" >
          <thead>
            <tr><th style="text-align: center;">"{{$areadetail->AreaName}}"</th></tr>
          </thead>
          <tbody>
            <tr><td>{{$areadetail->AreaName}}</td></tr>
            <tr><td>{{$areadetail->Description}}</td></tr>
            <tr><td>{{$areadetail->CountryData->CountryName}}</td></tr>
            <tr><td>{{$areadetail->MemberData->PersonData->PersonName}}</td></tr>
            @foreach($areadetail->StationAreaData as $sa)
            <tr><td> <strong>Station : </strong> {{$sa->StationData->StationName}}</td></tr>
            @endforeach
          </tbody>

          <tfoot>
          </tfoot>
        </table>
      </div>
  </div>
</div>