<?php
session_start();
include("../../config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM matakuliah WHERE id_matkul = '$id'");
    header("location: ../data-matkul.php?delete");
}