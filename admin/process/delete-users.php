<?php
session_start();
include("../../config.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM user WHERE id = '$id'");
    header("location: ../index.php?delete");
}