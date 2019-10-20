<?php
session_start();
include("../../config.php");
if(isset($_POST['submit'])){
    $npm = $_POST['npm'];
    $check = mysqli_query($conn, "SELECT * FROM npm WHERE npm = '$npm'");
    $num = mysqli_num_rows($check);
    if($num > 0){
        $check = mysqli_query($conn, "SELECT * FROM krs WHERE npm = '$npm'");
        $num = mysqli_num_rows($check);
        if($num > 0){
            header("location: ../index.php?error");
        }else{
            header("location: ../inputkrs.php?npm=".$npm);
        }
    }else{
        header("location: ../index.php?alert=1");
    }
}