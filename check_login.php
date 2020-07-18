<?php

	include 'connection.php'; 	// include = menambahkan/mengikutkan file, setting koneksi ke database
	
	$username	= $_POST['username']; // menangkap username
	$password	= $_POST['password']; // menangkap password
	
	$result = $db->query("SELECT * FROM users where username = '".$username."' and pass = '".$password."'");
	// echo "SELECT * FROM user where user = '".$user."' and pass = '".$pass."'";
	// cek apakah ada data yang sesuai
	if($result->num_rows > 0){
		// echo "User ada";
		while($row = $result->fetch_assoc()) {
			session_start();
			$_SESSION['user'] = $row['username']; 
			$_SESSION['pass'] = $row['pass'];
			$_SESSION['login'] = 'login';
		}
		if($_SESSION['login']=='login'){
			header('Location: dashboard.php');
		}
	}
	else{
		// echo "User tidak ada";
		$_SESSION['msg'] = 1;
		header('Location: login.php');
	}
?>