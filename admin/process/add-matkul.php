<?php
session_start();
include("../../config.php");
if(isset($_POST['submit'])){
    $kode_matkul = mysqli_real_escape_string($conn,$_POST['kode_matkul']);
    $nama_matkul = mysqli_real_escape_string($conn,$_POST['nama_matkul']);
    $sks = mysqli_real_escape_string($conn,$_POST['sks']);
    
    $check = mysqli_query($conn, "SELECT * FROM matakuliah WHERE nama_matkul = '$nama_matkul'");
    $num = mysqli_num_rows($check);
    if($num > 0){
        header("location: ../data-matkul.php?error");
    }else{
        mysqli_query($conn, "INSERT INTO matakuliah(kode_matkul,nama_matkul,sks) VALUES('$kode_matkul','$nama_matkul','$sks')");
        header("location: ../data-matkul.php?success");
    }
}