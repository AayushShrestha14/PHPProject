<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'connection.php';
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $term = $_GET['term'];
    
    $sql = "UPDATE examdata SET is_deleted=1 WHERE p_id=$id AND term=$term";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $_SESSION['message'] = "Record has been deleted successfully!";
    $_SESSION['msg_type'] = "success";

    header("location:index.php");
}
?>