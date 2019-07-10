<?php

$server = '127.0.0.1';
$username = 'root';
$password = 'password';
$schema = 'phpproject';

try {
    $pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

/* $ok=$pdo->query('INSERT INTO Person (firstname,surname) '. 
  'VALUES ("'.$_GET['firstname'].'","'.$_GET['surname'].'")');

  $ok=$pdo->query('INSERT INTO miscdata (firstname,surname) '.
  'VALUES ("'.$_GET['firstname'].'","'.$_GET['surname'].'")'); */

if (isset($_POST['Add'])) {
    
    $ok = $pdo->query('INSERT INTO personaldata (firstname, surname, dob, email)'
            . 'VALUES ("' . $_POST['firstname'] . '","' . $_POST['surname'] . '",'
            . '"' . $_POST['dob'] . '","' . $_POST['email'] . '") ');

    $last_id = $pdo->lastInsertId();
    
    $ok = $pdo->query('INSERT INTO examdata (computercommunication,computersystem,web1,'
            . 'softwareengineering1,problemsolving,database1,term,pid)'
            . 'VALUES ("' . $_POST['marks1'] . '","' . $_POST['marks2'] . '",'
            . '"' . $_POST['marks3'] . '","' . $_POST['marks4'] . '",'
            . '"' . $_POST['marks5'] . '","' . $_POST['marks6'] . '"'
            . ',"' . $_POST['term'] . '",' . $last_id . ') ');
    
    $_SESSION['message'] = "Record has been saved successfully!";
    $_SESSION['msg_type'] = "success";
    
    header("location:index.php");
    die();
}

if (isset($_POST['save&continue'])) {
    
    $ok = $pdo->query('INSERT INTO personaldata (firstname, surname, dob, email)'
            . 'VALUES ("' . $_POST['firstname'] . '","' . $_POST['surname'] . '",'
            . '"' . $_POST['dob'] . '","' . $_POST['email'] . '") ');

    $last_id = $pdo->lastInsertId();
    
    $ok = $pdo->query('INSERT INTO examdata (computercommunication,computersystem,web1,'
            . 'softwareengineering1,problemsolving,database1,term,pid)'
            . 'VALUES ("' . $_POST['marks1'] . '","' . $_POST['marks2'] . '",'
            . '"' . $_POST['marks3'] . '","' . $_POST['marks4'] . '",'
            . '"' . $_POST['marks5'] . '","' . $_POST['marks6'] . '"'
            . ',"' . $_POST['term'] . '",' . $last_id . ') ');
    
    $_SESSION['message'] = "Record has been saved successfully!";
    $_SESSION['msg_type'] = "success";
    
    header("location:add.php");
    die();
}
?>