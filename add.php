<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'shared/header.php';
include 'admin/connection.php';
?>
<div class="page-header">
    <h1>Add Student Details</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="studentdetails">
    <div class="form-group">
        <label class="control-label col-sm-2" for="firstname">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="firstname" 
                   placeholder="Enter your First Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="surname">Surname</label>
        <div class="col-sm-10"> 
            <input type="text" class="form-control" id="surname" name="surname" 
                   placeholder="Enter your Surname" ondrop="return false;" onpaste="return false;">

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="dob">Date of Birth</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter your Date of Birth">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" 
                   placeholder="Enter your Email Address" ondrop="return false;" onpaste="return false;">         
        </div>
    </div>
    <!-- <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Verify Password</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Re-Enter Password" name="verifypassword">
        </div>
    </div> -->
    <div class="form-group">
        <label class="control-label col-sm-2" for="course">Course</label>
        <div class="col-sm-3"> 
            <select class="form-control" id="course" name="course">
                <?php
                $result = $conn->query('SELECT * FROM courses WHERE is_deleted=false');
                echo '<option value="">Select Course</option>';
                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $id = $row['id'];
                    $name = $row['name'];
                   
                    echo '<option value="' . $id . '">' . $name . '</option>';
               }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="Register">Register</button>
            <button type="submit" class="btn btn-info" name="save&continue">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form> 
<?php include 'shared/footer.php' ?>