<?php
session_start();
include("../config.php");
include("partial/header.php");
$no = 1; 

$query = mysqli_query($conn, "SELECT * FROM user");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manajemen Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manajemen Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-primary">
                <h5 class="card-title">Manajemen Users
                  <div class="float-right">
                    <button type="button" name="adduser" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah User Baru</button>
                  </div>
                </h5>
              </div>
              <!-- /.card-header -->
              <form action="process/npmsubmit.php" method="POST">
                <div class="card-body">
                  <?php if(isset($_GET['error'])){ ?>
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      Username Sudah Digunakan!
                    </div>
                  <?php }else if(isset($_GET['edit'])){ ?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      User Berhasil Diedit
                    </div>
                  <?php }else if(isset($_GET['delete'])){ ?>
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      User Berhasil Dihapus
                    </div>
                  <?php }else if(isset($_GET['success'])){ ?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      User Berhasil Ditambahkan
                    </div>
                  <?php } ?>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($data=mysqli_fetch_array($query)){ ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['nama']; ?></td>
                          <td><?php echo $data['username']; ?></td>
                          <td><?php echo $data['password']; ?></td>
                          <td><?php echo $data['level']; ?></td>
                          <td>
                            <a href="edit_user.php?id=<?php echo $data['id']; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="process/delete-users.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						  </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Tambah User Data</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="process/add-users.php" method="post">
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label class="label-control">Nama</label>
            <input type="text" class="form-control" name="nama" autocomplete="off" required> 
          </div>
          <div class="form-group">
            <label class="label-control">Username</label>
            <input type="text" class="form-control" name="username" autocomplete="off" required> 
          </div>
          <div class="form-group">
            <label class="label-control">Password</label>
            <input type="password" class="form-control" name="password" autocomplete="off" required> 
          </div>
          <div class="form-group">
            <label class="label-control">Level</label>
            <select class="form-control" name="level">
              <option value="mahasiswa">Mahasiswa</option>
              <option value="admin">Admin</option>
            </select>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="submit"><i class="fa fa-save"></i> Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Main Footer -->
  <?php include("partial/footer.php");?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  <?php include("partial/js.php"); ?>
</body>
</html>
