<div class="modal-header">
        <h4 class="modal-title" id="gridSystemModalLabel">Yakin hapus Admin "{{$adminhapus->PersonData->PersonName}}"?</h4>
      </div>

      <div class="modal-footer">
        <a role="button" type="button" class="btn btn-danger" href="kelolaAdmin/hapus/{{$adminhapus->Member_ID}}">Hapus</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>