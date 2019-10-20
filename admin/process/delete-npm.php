<?php
session_start();
include("../../config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM npm WHERE npm = '$id'");
    header("location: ../data-npm.php?delete");
}