<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "header.php";
?>
<div class="page-header">
    <h1>Add Faculty</h1>
</div>
<form class="form-horizontal col-md-10" action="addfaculty.php"
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
                $result = $conn->query('SELECT * FROM faculties WHERE isdeleted=0');

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
            <button type="submit" class="btn btn-info" name="assignfaculty">Assign Faculty</button>
            <button type="submit" class="btn btn-info" name="save&continuefacassign">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
  <?php
    include "footer.php";
  ?>
