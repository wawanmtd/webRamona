<!-- <script src="../bootstrap/adminlte/plugins/fastclick/fastclick.min.js"></script>
<script src="../bootstrap/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../bootstrap/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../bootstrap/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="../bootstrap/adminlte/js/demo.js"></script> -->
@extends('admin.index')

@section('content-header')
  Kelola Admin
  <small>Lihat Admin</small>
@stop

@section('konten')
  <button type="button" action="#tambah" data-toggle="modal" data-target="#tambahAdminModal" class="btn btn-success">
    <span class="fa fa-plus"></span> Tambah</button>

<!-- Table Data Admin -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Admin</h3>
    </div>

    <div class="box-body">
      <table id="tableAdmin" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Role</th>
            <th>Station</th>
            <th>Area</th>
            <th colspan="2">Action</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Mochamad Tri Dharmawan</td>
            <td>wawanmtd</td>
            <td>Super Admin</td>
            <td>-</td>
            <td>-</td>
            <td style="width:5%">
              <button type="button" action="#ubah" data-toggle="modal" data-target="#ubahAdminModal" class="btn btn-info">
                <span class="fa fa-edit"></span></button>
            </td>
            <td style="width:5%">
              <button type="button" action="#hapus" data-toggle="modal" data-target="#hapusAdminModal" class="btn btn-danger">
                <span class="fa fa-trash"></span></button>
            </td>
          </tr>

          <tr>
            <td>Muchtar Prawira</td>
            <td>muchtarpr</td>
            <td>Admin</td>
            <td>Batan</td>
            <td>Puspiptek</td>
            <td>
              <button type="button" action="#ubah" data-toggle="modal" data-target="#ubahAdminModal" class="btn btn-info">
                <span class="fa fa-edit"></span></button>
            </td>
            <td>
              <button type="button" action="#hapus" data-toggle="modal" data-target="#hapusAdminModal" class="btn btn-danger">
                <span class="fa fa-trash"></span></button>
            </td>
          </tr>

          <tr>
            <td>Gerald Viko Ananda</td>
            <td>seishiro</td>
            <td>Manajerial</td>
            <td>Batan</td>
            <td>Puspiptek</td>
            <td>
              <button type="button" action="#ubah" data-toggle="modal" data-target="#ubahAdminModal" class="btn btn-info">
                <span class="fa fa-edit"></span></button>
            </td>
            <td>
              <button type="button" action="#hapus" data-toggle="modal" data-target="#hapusAdminModal" class="btn btn-danger">
                <span class="fa fa-trash"></span></button>
            </td>
          </tr>
        </tbody>

        <tfoot >
          <tr>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Role</th>
            <th>Station</th>
            <th>Area</th>
            <th colspan="2">Action</th>

          </tr>
        </tfoot>
      </table>

    </div>
  </div>
<!-- end Table Data Admin -->

<!-- modal Tambah Admin -->
  <div class="modal fade" id="tambahAdminModal" tabindex="-1" role="dialog" aria-labelledby="tambahAdminModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Tambah Admin</h4>
        </div>

        <div class="modal-body ">
          <form role="form" action="{{action("adminController\KelolaAdminController@tambah")}}" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              </div>

              <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- end modal Tambah Admin -->

<!-- modal Ubah Admin -->
  <div class="modal fade" id="ubahAdminModal" tabindex="0" role="dialog" aria-labelledby="ubahAdminModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Ubah Admin</h4>
        </div>

        <div class="modal-body ">
          <form role="form" action="{{action("adminController\KelolaAdminController@ubah")}}" method="post">
            <div class="box-body">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter email" value="" required>
              </div>

              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" value="" required>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" value="" required>
              </div>

              <div class="modal-footer">
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- end Ubah Admin -->

<!-- modal Hapus Admin -->
  <div class="modal fade" id="hapusAdminModal" tab-index="-1" role="dialog" aria-labeledby="hapusAdminModalLabel">
    <div class="modal-dialog modal-sm" role="alertdialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="gridSystemModalLabel">Yakin hapus?</h4>
        </div>

        <div class="modal-footer">
          <a role="button" type="button" class="btn btn-danger" href="{{action("adminController\KelolaAdminController@hapus")}}">Hapus</a>
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>
<!-- end modal Hapus Admin -->

@stop
