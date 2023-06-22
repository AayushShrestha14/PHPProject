<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include 'shared/header.php';

include 'admin/connection.php';//database connection
	//see if there is a row with the email entered in the login form
	$userQuery = $conn->prepare('SELECT * FROM users WHERE username = :username');
	if($_POST){
		$criteria=[
			'username' => $_POST['username'],
		];
		$result = $userQuery->execute($criteria);
	}
	$user=$userQuery->fetch();
	
	if(password_verify($_POST['password'], $user['password'])){
		$_SESSION['id'] = $user['id'];
	}else{
		echo 'Invalid email and/or password';
	}
?>
<?php 
	$personalQuery = $conn->prepare('SELECT * FROM personaldata WHERE id=:id');
	$personalQuery->bindParam(':id', $_SESSION['id']);
    $personalQuery->execute();
    $personal = $personalQuery->fetch();

?>
<h3>Welcome <?php echo $personal['first_name'] ?></h3>
<h3 class="text-center">Student Personal Details</h3>
<h4>Name: <?php echo $personal['first_name'] . ' ' . $personal['surname']; ?></h3>
<h4>Student ID: <?php echo $personal['id']; ?></h4>
<h4>Date of Birth: <?php echo $personal['dob']; ?></h4>
<h4>Email: <?php echo $personal['email']; ?></h4>
<h4>PAT: </h4>
<?php include 'shared/footer.php'; ?>