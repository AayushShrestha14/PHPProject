<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include 'header.php';

include 'connection.php';//database connection
	//see if there is a row with the email entered in the login form
	$userQuery = $conn->prepare('SELECT * FROM personaldata WHERE email = :email');
	if($_POST){
		$criteria=[
			'email' => $_POST['email']
		];
		$result = $userQuery->execute($criteria);
	}
	$user=$userQuery->fetch();
       
	if(password_verify($_POST['password'], $user['password'])){
		$_SESSION['id'] = $user['id'];//for ex7
		echo 'Welcome back, '.$user['firstname'];
	}else{
		echo 'Invalid email and/or password';
	}
?>
<br>
<a href='home.php'>Go to Home page</a>