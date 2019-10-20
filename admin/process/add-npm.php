<?php
session_start();
include("../../config.php");
if(isset($_POST['submit'])){
    $npm = mysqli_real_escape_string($conn,$_POST['npm']);
    $nim = mysqli_real_escape_string($conn,$_POST['nim']);
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    
    $check = mysqli_query($conn, "SELECT * FROM npm WHERE npm = '$npm'");
    $num = mysqli_num_rows($check);
    if($num > 0){
        header("location: ../data-npm.php?error");
    }else{
        mysqli_query($conn, "INSERT INTO npm(npm,nim,nama) VALUES('$npm','$nim','$nama')");
        header("location: ../data-npm.php?success");
    }
}