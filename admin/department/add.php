<?php
ob_start();
include "../shared/header.php";
include "../connection.php";
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
      method="post" name="addDepartmentForm">
    <div class="form-group">
        <label class="control-label col-sm-2" for="departmentName">Department Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="departmentName" name="departmentName" 
                   placeholder="Enter Department Name" required>        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="add">Add New</button>
            <button type="submit" class="btn btn-info" name="s&cDept">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger" onclick="die();">Cancel</span></a>
        </div>
    </div>
    <?php
    if (isset($_POST['add']) || isset($_POST['s&cDept'])) {

        $sql = "INSERT INTO dept (name) VALUES (:departmentName)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'departmentName' => $_POST['departmentName']
        ];
        //check dept name for unique value
        $stmt = $conn->prepare("SELECT * FROM dept WHERE name=:departmentName");
        $stmt->execute(['departmentName' => $_POST['departmentName']]);
        $row = $stmt->fetch();
        if ($row) {
            if ($row['name'] == $_POST['departmentName']) {
                echo "<script>alert('Department Name already exists!');</script>";
                die();
            }
        }
        $stmt->execute($criteria);
        header("location:index.php");
        die();
    }
    ?>
    
</form>
   
    <?php
    include "../shared/footer.php";
    ob_end_flush();
    ?>