<?php
session_start();
include("../config.php");
include("partial/header.php");
$no = 1;

if(isset($_POST['submit'])){
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $kode_matkul = mysqli_real_escape_string($conn,$_POST['kode_matkul']);
    $nama_matkul = mysqli_real_escape_string($conn,$_POST['nama_matkul']);
    $sks = mysqli_real_escape_string($conn,$_POST['sks']);
    $level = mysqli_real_escape_string($conn,$_POST['level']);

    mysqli_query($conn, "UPDATE matakuliah SET kode_matkul = '$kode_matkul', nama_matkul = '$nama_matkul', sks = '$sks' WHERE id_matkul = $id");
    header("location: data-matkul.php?edit");
}


$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM matakuliah WHERE id_matkul = $id");
$data = mysqli_fetch_array($query);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Mata Kuliah</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Mata Kuliah</a></li>
              <li class="breadcrumb-item active">Edit Mata Kuliah</li>
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
                <h5 class="card-title">Edit Mata Kuliah</h5>
              </div>
              <!-- /.card-header -->
              <form action="edit_matkul.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label class="label-control">Kode Matkul</label>
                    <input type="hidden" name="id" value="<?php echo $data['id_matkul']; ?>">
                    <input type="text" class="form-control" name="kode_matkul" autocomplete="off" required value="<?php echo $data['kode_matkul']; ?>"> 
                  </div>
                  <div class="form-group">
                    <label class="label-control">Mata Kuliah</label>
                    <input type="text" class="form-control" name="nama_matkul" autocomplete="off" required value="<?php echo $data['nama_matkul']; ?>"> 
                  </div>
                  <div class="form-group">
                    <label class="label-control">SKS</label>
                    <input type="number" class="form-control" name="sks" autocomplete="off" required value="<?php echo $data['sks']; ?>"> 
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
