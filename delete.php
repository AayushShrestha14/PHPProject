<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require 'pdo.php';
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "UPDATE examdata SET isdeleted=1 WHERE pid=$id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $_SESSION['message'] = "Record has been deleted successfully!";
    $_SESSION['msg_type'] = "danger";
    
    header("location:index.php");
}
?>