<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "../shared/header.php";
?>
<div class="page-header">
    <h1>Add Faculty</h1>
</div>
<form class="form-horizontal col-md-10" action="add.php"
      method="post" name="addFaculty">
    
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Faculty Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" 
                   placeholder="Enter Faculty Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>

    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="add">Add Faculty</button>
            <button type="submit" class="btn btn-info" name="s&cFaculty">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    
</form>
  <?php
    include "../shared/footer.php";
  ?>
