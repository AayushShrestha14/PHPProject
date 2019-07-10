<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'pdo.php';

if (isset($_POST['edit'])) {

    $sql = 'UPDATE personaldata SET firstname="' . $_POST['firstname'] . '",surname="' . $_POST['surname'] . '",'
            . 'dob="' . $_POST['dob'] . '",email="' . $_POST['email'] . '" WHERE id=' . $_POST['id'];
    $result = $pdo->prepare($sql);
    $result->execute();

    $sql2 = 'UPDATE examdata SET computercommunication="' . $_POST['marks1'] . '",computersystem="' . $_POST['marks2'] . '",'
            . 'web1="' . $_POST['marks3'] . '",softwareengineering1="' . $_POST['marks4'] . '",'
            . 'problemsolving="' . $_POST['marks5'] . '", database1="' . $_POST['marks6'] . '" '
            . 'WHERE pid="' . $_POST['id'] . '" AND term=' . $_POST['term'];
    $result2 = $pdo->prepare($sql2);
    $result2->execute();
    $_SESSION['message'] = "Record has been updated successfully!";
    $_SESSION['msg_type'] = "warning";

    header("location:index.php");
    
}
?>