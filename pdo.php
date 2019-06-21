<?php
	$server='127.0.0.1';
	$username='root';
	$password='password';
	$schema='students';
	$pdo=new PDO('mysql:dbname='.$schema.';host='.$server,$username,$password);
	
	//$results=$pdo->query('SELECT * FROM Person');
	$ok=$pdo->query('INSERT INTO students (Firstname,Surname,dob,marks1,marks2,marks3,marks4,marks5) '. 
				'VALUES ("'.$_POST['firstname'].'","'.$_POST['surname'].'","'.$_POST['dob'].'","'.$_POST['marks1'].'","'.$_POST['marks2'].'","'.$_POST['marks3'].'","'.$_POST['marks4'].'","'.$_POST['marks5'].'")');
	
	$results=$pdo->query('SELECT * FROM students');
	
	foreach ($results as $row){
		echo '<p>'.$row['Firstname']. ' was born on '.$row['Birthday'].'. Their email address is '.$row['Email'].'</p>';
	}

?>