<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'connection.php';
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $sql = "UPDATE faculties SET isdeleted=1 WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE faculty_subject SET isdeleted=1 WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION['message'] = "Record has been deleted successfully!";
    $_SESSION['msg_type'] = "danger";

    header("location:addfaculty.php");
}
?>