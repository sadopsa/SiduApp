<?php
session_start();
include("../config.php");
include("partial/header.php");
if(!isset($_GET['npm'])){
    header("location: index.php");
}
/* Start = menentukan semester ganjil/genap */
$nama_bulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$bulan = date('n') - 1;
$bulan_ini = $nama_bulan[$bulan];
$data_arr = array(0 => array("semester" => 0, "month" => "Agustus September Oktober November Desember"),
1 => array("semester" => 1, "month" => "Januari Februari Maret April Mei Juni Juli")
);
for ($i=0; $i<count($data_arr); $i++) {
    if ($bulan_ini == $data_arr[$i]['month']){
        $bulan_ini = 'Ganjil';
    }
    else {
        $bulan_ini = 'Genap';
    }
}
$semester = $bulan_ini;
$tahun = date('Y',strtotime(date("Y", mktime()) . " - 365 day"));

$npm = $_GET['npm'];

$query = mysqli_query($conn, "SELECT a.npm, a.kodekuliah, b.nama_matkul, a.semester, a.tahun, b.sks FROM krs a JOIN matakuliah b ON a.kodekuliah = b.kode_matkul WHERE a.npm = '$npm' AND a.semester = '$semester' AND a.tahun = '$tahun'");
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
                <h5 class="card-title">Berikut KRS yang Anda Ambil:</h5>

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
              <form action="process/npmsubmit.php" method="POST">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class='thead-dark text-center'>
                            <tr>
                                <th>No.</th>
                                <th>Kode Mata Kuliah</th>
                                <th>Nama Mata Kuliah</th>
                                <th>Semester</th>
                                <th>Tahun</th>
                                <th>SKS</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $no=1; $number = 0; while($res=mysqli_fetch_array($query)){ ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $res['kodekuliah']; ?></td>
                                <td><?php echo $res['nama_matkul']; ?></td>
                                <td><?php echo $res['semester']; ?></td>
                                <td><?php echo $res['tahun']; ?></td>
                                <td><?php echo $res['sks']; ?></td>
                                <?php $number += $res['sks']; ?>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td colspan="5">Jumlah SKS</td>
                              <td><b><?php echo $number; ?></b></td>
                            </tr>
                        </tbody>
                      </table>
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                  <div class="text-center">
                    <a href="index.php" class="btn btn-success"><i class="fa fa-home"></i> Back to Home</a>
                    <button type="button" class="btn btn-info" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
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
