<?php

include 'header.php';
?>
<form class="form-horizontal col-md-10" action="update.php"
      method="post" name="studentmarks">
          
<div class="form-group">
        <label class="control-label col-sm-2" for="term">Term</label>
        <div class="col-sm-10"> 
            <input class="form-control" id="term" name="term" value="<?php echo $term ;?>" readonly/>                   
        </div>
    </div>
    <!--<div class="form-group">
        <label class="control-label col-sm-2" for="subject1">Subject1</label>
        <div class="col-sm-10"> 
            <input type="text" class="form-control" id="subject1" name="subject1" placeholder="Enter Subject1">
        </div>
    </div>-->

    <div class="form-group">
        <label class="control-label col-sm-2" for="marks1">Computer Communication</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks1" name="marks1" placeholder="Enter Marks" 
                   value="<?php echo $computercommunication; ?>"
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks2">Computer System</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks2" name="marks2" placeholder="Enter Marks" 
                   value="<?php echo $computersystem; ?>"
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks3">Web Development</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks3" name="marks3" placeholder="Enter Marks" 
                   value="<?php echo $web1; ?>"
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>          
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks4">Software Engineering 1</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks4" name="marks4" placeholder="Enter Marks" 
                   value="<?php echo $softwareengineering1; ?>"
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>          
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks5">Problem Solving and Programming</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks5" name="marks5" placeholder="Enter Marks" 
                   value="<?php echo $problemsolving; ?>"
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>          
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks6">Database-1</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks6" name="marks6" placeholder="Enter Marks" 
                   value="<?php echo $database1; ?>"
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>    
</form>
<?php 
include 'footer.php';
?>