<?php
session_start();
include("../config.php");
include("partial/header.php");
$no = 1;

if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $level = mysqli_real_escape_string($conn,$_POST['level']);

    mysqli_query($conn, "UPDATE user SET nama = '$nama', username = '$username', password = '$password', level = '$level' WHERE id = $id");
    header("location: index.php?edit");
}


$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id = $id");
$data = mysqli_fetch_array($query);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Manajemen Users</a></li>
              <li class="breadcrumb-item active">Edit Users</li>
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
                <h5 class="card-title">Edit Users</h5>
              </div>
              <!-- /.card-header -->
              <form action="edit_user.php" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label class="label-control">Nama</label>
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <input type="text" class="form-control" name="nama" autocomplete="off" required value="<?php echo $data['nama']; ?>"> 
                    </div>
                    <div class="form-group">
                        <label class="label-control">Username</label>
                        <input type="text" class="form-control" name="username" autocomplete="off" required value="<?php echo $data['username']; ?>"> 
                    </div>
                    <div class="form-group">
                        <label class="label-control">Password</label>
                        <input type="password" class="form-control" name="password" autocomplete="off" value="<?php echo $data['password']; ?>" required> 
                    </div>
                    <div class="form-group">
                        <label class="label-control">Level</label>
                        <select class="form-control" name="level">
                            <option value="mahasiswa" <?php echo ($data['level'] == 'mahasiswa') ? 'selected' : ''; ?>>Mahasiswa</option>
                            <option value="admin" <?php echo ($data['level'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div>
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                  <div class="text-center">
                    <button type="submit" name="submit" onclick="return confirm('Yakin Simpan?')" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                  </div>
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

  <!-- Main Footer -->
  <?php include("partial/footer.php");?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
  <?php include("partial/js.php"); ?>
</body>
</html>
