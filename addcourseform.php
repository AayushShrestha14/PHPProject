<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "header.php";
include 'connection.php';
?>
<div class="page-header">
    <h1>Add Course</h1>
</div>
<form class="form-horizontal col-md-10" action="addcourse.php"
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
            <button type="submit" class="btn btn-info" name="save&continuefac">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="coursename">Course Name</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="coursenamelist" name="coursenamelist">
                <?php
                $result = $conn->query('SELECT * FROM course WHERE isdeleted=0');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $cid = $row['Courseid'];
                    $name = $row['name'];

                    echo '<option value="' . $cid . '">' . $name . '</option>';
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
                $result = $conn->query('SELECT * FROM subjects WHERE isdeleted=0');

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
            <button type="submit" class="btn btn-info" name="save&continuefacassign">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
  <?php
    include "footer.php";
  ?>
