<?php
session_start();
include("../../config.php");
if(isset($_POST['submit'])){
    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $level = mysqli_real_escape_string($conn,$_POST['level']);
    $check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $num = mysqli_num_rows($check);
    if($num > 0){
        header("location: ../index.php?error");
    }else{
        mysqli_query($conn, "INSERT INTO user(nama,username,password,level)VALUES('$nama','$username','$password','$level')");
        header("location: ../index.php?success");
    }
}