<?php
session_start();
include("../config.php");
include("partial/header.php"); 
if(!isset($_GET['npm'])){
    header("location: index.php");
}

$data_user = mysqli_query($conn, "SELECT * FROM npm WHERE npm = '".$_GET['npm']."'");
$data = mysqli_fetch_array($data_user);
$sks = mysqli_query($conn, "SELECT * FROM matakuliah");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
                <h5 class="card-title">Silahkan isi KRS</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <form action="process/process-krs.php" method="POST">
                <div class="card-body">
                  <div class="row m-2">
                    <div class="col-12">
                        <b><center>NIM : <?php echo $data['nim']; ?></center></b>
                        <b><center>Nama : <?php echo $data['nama']; ?></center></b>
                        <input type="hidden" name="npm" value="<?php echo $_GET['npm']; ?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 mx-auto">
                      <table class="table table-striped">
                        <thead class='thead-dark text-center'>
                            <tr>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Ambil</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php while($res=mysqli_fetch_array($sks)){ ?>
                            <tr>
                                <td><?php echo $res['kode_matkul']; ?></td>
                                <td><?php echo $res['nama_matkul']; ?></td>
                                <td><?php echo $res['sks']; ?></td>
                                <td>
                                <input type="hidden" name="sks[]" value="<?php echo $res['sks']; ?>">
                                <input type="checkbox" class="form-control checkbox_check" name="ambil[]" value="<?php echo $res['kode_matkul']; ?>"></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                  <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
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
<script>
</script>
</html>
