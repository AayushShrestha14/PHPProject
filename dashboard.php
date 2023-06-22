<?php
session_start();
    include 'shared/header.php';
	
	include 'admin/connection.php';//database connection
	if(isset($_SESSION['id'])){
		$stmt = $conn->prepare('SELECT * FROM users WHERE id = :id');
		$criteria = [
			'id' => $_SESSION['id']
		];
		$stmt->execute($criteria);
		$user = $stmt->fetch();
		echo 'You are logged in as '.$user['username'];
	}else{
		echo 'You are not logged in.';
		echo 'Log in:';
		echo '<a href="login.php">Log in Page</a>';
	}
?>