<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'connection.php';

if (isset($_POST['updatefaculty'])) {

    $sql = "UPDATE faculties SET name=:facultyname WHERE id=$facultyid";
    $stmt = $conn->prepare($sql);
    $criteria = [
        'facultyname' => $_POST['facultyname']
    ];
    $stmt->execute($criteria);
    die();
    header("location:editfaculty.php");
}
?>