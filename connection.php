<?php

$server = '127.0.0.1';
$username = 'root';
$password = 'password';
$schema = 'phpproject';

try {
    $conn = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

/* $ok=$conn->query('INSERT INTO Person (firstname,surname) '. 
  'VALUES ("'.$_GET['firstname'].'","'.$_GET['surname'].'")');

  $ok=$conn->query('INSERT INTO miscdata (firstname,surname) '.
  'VALUES ("'.$_GET['firstname'].'","'.$_GET['surname'].'")'); */

if (isset($_POST['Add'])) {
    $firstname=$_POST['firstname'];
    $surname=$_POST['surname'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $roleid=$_POST['role'];
    $ok = $conn->prepare("INSERT INTO personaldata (firstname, surname, dob, email,password,roleid) VALUES ('$firstname','$surname','$dob','$email','$password','$roleid')");
   
    
    $ok->execute();
//    $last_id = $conn->lastInsertId();
//    
//    $ok = $conn->query('INSERT INTO examdata (computercommunication,computersystem,web1,'
//            . 'softwareengineering1,problemsolving,database1,term,pid)'
//            . 'VALUES ("' . $_POST['marks1'] . '","' . $_POST['marks2'] . '",'
//            . '"' . $_POST['marks3'] . '","' . $_POST['marks4'] . '",'
//            . '"' . $_POST['marks5'] . '","' . $_POST['marks6'] . '"'
//            . ',"' . $_POST['term'] . '",' . $last_id . ') ');
    
    $_SESSION['message'] = "Record has been saved successfully!";
    $_SESSION['msg_type'] = "success";
    
    header("location:index.php");
    die();
}

if (isset($_POST['save&continue'])) {
    
    $ok = $conn->query('INSERT INTO personaldata (firstname, surname, dob, email)'
            . 'VALUES ("' . $_POST['firstname'] . '","' . $_POST['surname'] . '",'
            . '"' . $_POST['dob'] . '","' . $_POST['email'] . '") ');

//    $last_id = $conn->lastInsertId();
//    
//    $ok = $conn->query('INSERT INTO examdata (computercommunication,computersystem,web1,'
//            . 'softwareengineering1,problemsolving,database1,term,pid)'
//            . 'VALUES ("' . $_POST['marks1'] . '","' . $_POST['marks2'] . '",'
//            . '"' . $_POST['marks3'] . '","' . $_POST['marks4'] . '",'
//            . '"' . $_POST['marks5'] . '","' . $_POST['marks6'] . '"'
////            . ',"' . $_POST['term'] . '",' . $last_id . ') ');
    
    $_SESSION['message'] = "Record has been saved successfully!";
    $_SESSION['msg_type'] = "success";
    
    header("location:add.php");
    die();
}
?>