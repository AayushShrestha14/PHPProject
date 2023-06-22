<?php
ob_start();
include '../shared/header.php';
include "../connection.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    <?php
    if (isset($_POST['add']) || isset($_POST['s&cFaculty'])) {
        
        $sql = "INSERT INTO faculties (name) VALUES (:name)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'name' => $_POST['name']
        ];
        $stmt->execute($criteria);
        if (isset($_POST['add'])) {
            header("location:index.php");
        }
        die();     
    }
    ob_end_flush();
    ?>

<?php include '../shared/footer.php'; ?>  