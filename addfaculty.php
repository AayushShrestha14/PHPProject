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
    <h1>Add Faculty</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="studentdetails">
    <div class="form-group">
        <label class="control-label col-sm-2" for="facultyname">Faculty Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="facultyname" name="facultyname" 
                   placeholder="Enter Faculty Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="addfaculty">Add Faculty</button>
            <button type="submit" class="btn btn-info" name="save&continuefac">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="facultyname">Faculty Name</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="facultynamelist" name="facultynamelist">
                <?php
                $result = $conn->query('SELECT * FROM faculties');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $fid = $row['id'];
                    $name = $row['name'];
                   
                    echo '<option value="' . $fid . '">' . $name . '</option>';
               }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="subject">Subject</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="subject" name="subject">
                <?php
                $result = $conn->query('SELECT * FROM subjects');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $sid = $row['id'];
                    $name = $row['name'];
                   
                    echo '<option value="' . $sid . '">' . $name . '</option>';
               }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="assignfaculty">Assign Faculty</button>
            <button type="submit" class="btn btn-info" name="save&continuefacassign">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <?php
    if(isset($_POST['addfaculty'])){
    $sql="INSERT INTO faculties (name) VALUES (:facultyname)";
    $stmt=$conn->prepare($sql);
    $criteria=[
        'facultyname'=>$_POST['facultyname']
    ];
    $stmt->execute($criteria);
    die();
    header("location:index.php");
    }
    if(isset($_POST['save&continuefac'])){
    $sql="INSERT INTO faculties (name) VALUES (:facultyname)";
    $stmt=$conn->prepare($sql);
    $criteria=[
        'facultyname'=>$_POST['facultyname']
    ];
    $stmt->execute($criteria);
    die();
    //header("location:index.php");
    }
    if(isset($_POST['assignfaculty'])){
    
    $sql="INSERT INTO faculty_subject (facultyid,subjectid) VALUES (:facultynamelist,:subject)";   
    $stmt=$conn->prepare($sql);
    $criteria=[
        'facultynamelist'=>$_POST['facultynamelist'],
        'subject'=>$_POST['subject']
    ];
    $stmt->execute($criteria);
    die();
    header("location:index.php");
    }
    if(isset($_POST['save&continuefacassign'])){
    $sql="INSERT INTO faculty_subject (facultyid,subjectid) VALUES (:facultynamelist,:subject)";   
    $stmt=$conn->prepare($sql);
    $criteria=[
        'facultynamelist'=>$_POST['facultynamelist'],
        'subject'=>$_POST['subject']
    ];
    $stmt->execute($criteria);
    die();
    //header("location:index.php");
    }
    ?>
<?php
include "footer.php";
?>
