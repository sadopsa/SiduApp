<?php
session_start();
include("../config.php");
include("partial/header.php");
$no = 1; 

$query = mysqli_query($conn, "SELECT * FROM npm");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">NPM</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">NPM</li>
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
                <h5 class="card-title">NPM
                  <div class="float-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah NPM</button>
                  </div>
                </h5>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <?php if(isset($_GET['error'])){ ?>
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      NPM Sudah Digunakan!
                    </div>
                  <?php }else if(isset($_GET['edit'])){ ?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      NPM Berhasil Diedit
                    </div>
                  <?php }else if(isset($_GET['delete'])){ ?>
                    <div class="alert alert-danger alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      NPM Berhasil Dihapus
                    </div>
                  <?php }else if(isset($_GET['success'])){ ?>
                    <div class="alert alert-success alert-dismissible">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      NPM Berhasil Ditambahkan
                    </div>
                  <?php } ?>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>NPM</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while($data=mysqli_fetch_array($query)){ ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['npm']; ?></td>
                          <td><?php echo $data['nim']; ?></td>
                          <td><?php echo $data['nama']; ?></td>
                          <td>
                            <a href="process/delete-npm.php?id=<?php echo $data['npm']; ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
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
          <h4 class="modal-title">Tambah NPM</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form action="process/add-npm.php" method="post">
        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label class="label-control">NPM</label>
            <input type="text" class="form-control" name="npm" autocomplete="off" required> 
          </div>
          <div class="form-group">
            <label class="label-control">NIM</label>
            <input type="text" class="form-control" name="nim" autocomplete="off" required> 
          </div>
          <div class="form-group">
            <label class="label-control">Nama</label>
            <input type="text" class="form-control" name="nama" autocomplete="off" required> 
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
