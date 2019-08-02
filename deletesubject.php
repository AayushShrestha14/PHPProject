<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'connection.php';
if (isset($_GET['deletesubject'])) {
    $id = $_GET['deletesubject'];
    
    $sql = "UPDATE subjects SET isdeleted=1 WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $sql = "UPDATE course_subject SET isdeleted=1 WHERE subjectid=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $sql = "UPDATE faculty_subject SET isdeleted=1 WHERE subjectid=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    $sql = "UPDATE exam_subject SET isdeleted=1 WHERE subjectid=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION['message'] = "Record has been deleted successfully!";
    $_SESSION['msg_type'] = "danger";

    header("location:indexsubject.php");
}
?>