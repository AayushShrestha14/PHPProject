<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'connection.php';
if (isset($_GET['deletesubjectexam'])) {
    $id = $_GET['deletesubjectexam'];
    //$subjectid=$_GET['subject'];
    
    $sql = "UPDATE exam_subject SET isdeleted=1 WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION['message'] = "Record has been deleted successfully!";
    $_SESSION['msg_type'] = "danger";

    header("location:indexsubjectexam.php");
}
?>