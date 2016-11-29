<!DOCTYPE html>
<html>
<head>
	<title>Area - hapus modal</title>
</head>
<body>
	<!-- untuk hapus -->
	<div class="modal-header">
        <h4 class="modal-title" id="gridSystemModalLabel">Yakin hapus Area {{$areahapus->AreaName}}?</h4>
      </div>

      <div class="modal-footer">
        <a role="button" type="button" class="btn btn-danger" href="kelolaArea/hapus/{{$areahapus->Area_ID}}">Hapus</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
     </div>
</body>
</html>