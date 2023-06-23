<?php
$server = $_SERVER['SERVER_NAME'];
$username = $_ENV['USERNAME'];
$password = $_ENV['PASSWORD'];
$schema = $_ENV['SCHEMA'];
$port = $_ENV['PORT'];

try {
    $conn = new PDO('pgsql:dbname=' . $schema . ';port=' . $port . '; host=' . $server, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

if (isset($_POST['Register'])) {
    $first_name=$_POST['firstname'];
    $surname=$_POST['surname'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $courseId=$_POST['course'];
    
        
    $ok = $conn->prepare("INSERT INTO personaldata (first_name, surname, dob, email, course_id)"
            . "VALUES ('$first_name', '$surname', '$dob', '$email', '$courseId')");    
    $ok->execute();

    $_SESSION['message'] = "Record has been saved successfully!";
    $_SESSION['msg_type'] = "success";
    
    die();
    }


if (isset($_POST['save&continue'])) {
    //if($password===$repassword){
    $ok = $conn->prepare("INSERT INTO personaldata (firstname, surname, dob, email, course_id) "
            . "VALUES ('$firstname','$surname','$dob','$email','$courseId')");    
    $ok->execute();
 
    $_SESSION['message'] = "Record has been saved successfully!";
    $_SESSION['msg_type'] = "success";
    
    //header("location:add.php");
    die();
}
//}
?>
