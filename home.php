<?php
session_start();
    include 'header.php';
	
	include 'connection.php';//database connection
	if(isset($_SESSION['id'])){
		$stmt = $conn->prepare('SELECT * FROM personaldata WHERE id = :id');
		$criteria = [
			'id' => $_SESSION['id']
		];
		$stmt->execute($criteria);
		$user = $stmt->fetch();
		echo 'You are logged in as '.$user['firstname'];
	}else{
		echo 'You are not logged in.';
		echo 'Log in:';
		echo '<a href="login.php">Log in Page</a>';
	}
?>