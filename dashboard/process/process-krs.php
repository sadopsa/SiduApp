<?php
session_start();
include("../../config.php");
if(isset($_POST['submit'])){
    $ambil = $_POST['ambil'];
    $npm = $_POST['npm'];

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

    foreach($ambil as $value){
        $input = mysqli_query($conn,"INSERT INTO krs (npm, kodekuliah, semester, tahun) VALUES('$npm', '$value', '$semester', '$tahun')");
    }

    header("location: ../hasil.php?npm=".$npm);
}