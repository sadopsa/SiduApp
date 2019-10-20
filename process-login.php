<?php
require_once('config.php');

if(isset($_POST['submit'])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
	$num = mysqli_num_rows($query);
	if($num > 0){
		session_start();
		$data = mysqli_fetch_array($query);
		$_SESSION['username'] = $data['username'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['level'] = $data['level'];
		if($data['level'] == 'admin'){
			header("location: admin");
		}else if($data['level'] == 'mahasiswa'){
			header("location: dashboard");
		}
	}else{
		echo "<script>alert('Login Gagal! Pastikan anda memasukkan username dan password dengan benar.');
		window.location='index.php'</script>";
	}
}else{
	header("location: index.php");
}

?>