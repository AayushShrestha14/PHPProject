<?php
include "header.php";
include "connection.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="page-header">
    <h1>Add Department</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="studentdetails">
    <div class="form-group">
        <label class="control-label col-sm-2" for="departmentname">Department Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="departmentname" name="departmentname" 
                   placeholder="Enter Department Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="adddepartment">Add Department</button>
            <button type="submit" class="btn btn-info" name="save&continuedept">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <?php
    if (isset($_POST['adddepartment'])) {

        $sql = "INSERT INTO department (name) VALUES (:departmentname)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'departmentname' => $_POST['departmentname']
        ];
        $stmt->execute($criteria);
        die();
        header("location:index.php");
    }
    if (isset($_POST['save&continuedept'])) {
        $sql = "INSERT INTO department (name) VALUES (:departmentname)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'departmentname' => $_POST['departmentname']
        ];
        $stmt->execute($criteria);
        die();
        //header("location:index.php");
    }
    ?>
    <?php
    include "footer.php";
    ?>
