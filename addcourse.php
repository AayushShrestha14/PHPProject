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
    <h1>Add Course</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="studentdetails">
    <div class="form-group">
        <label class="control-label col-sm-2" for="coursename">Course Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="coursename" name="coursename" 
                   placeholder="Enter Course Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="addcourse">Add Course</button>
            <button type="submit" class="btn btn-info" name="save&continuecourse">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="coursename">Course Name</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="coursenamelist" name="coursenamelist">
                <?php
                $result = $conn->query('SELECT * FROM course');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $fid = $row['Courseid'];
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
            <button type="submit" class="btn btn-info" name="assigncourse">Assign Course</button>
            <button type="submit" class="btn btn-info" name="save&continuecourseassign">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <?php
    if(isset($_POST['addcourse'])){
    $sql="INSERT INTO course (name) VALUES (:coursename)";
    $stmt=$conn->prepare($sql);
    $criteria=[
        'coursename'=>$_POST['coursename']
    ];
    $stmt->execute($criteria);
    die();
    header("location:index.php");
    }
    if(isset($_POST['save&continuecourse'])){
    $sql="INSERT INTO course (name) VALUES (:coursename)";
    $criteria=[
        'coursename'=>$_POST['coursename']
    ];
    $stmt=$conn->prepare($sql);
    $stmt->execute($criteria);
    die();
    //header("location:index.php");
    }
    if(isset($_POST['assigncourse'])){
    
    $sql="INSERT INTO course_subject (courseid,subjectid) VALUES (:coursenamelist,:subject)";   
    $stmt=$conn->prepare($sql);
    $criteria=[
        'coursenamelist'=>$_POST['coursenamelist'],
        'subject'=>$_POST['subject']
    ];
    $stmt->execute($criteria);
    die();
    header("location:index.php");
    }
    if(isset($_POST['save&continuecourseassign'])){
    $sql="INSERT INTO course_subjects (courseid,subjectid) VALUES (:coursenamelist,:subject)";   
    $stmt=$conn->prepare($sql);
    $criteria=[
        'coursenamelist'=>$_POST['coursenamelist'],
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
