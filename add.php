<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'header.php';
include 'pdo.php';
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
    <div class="form-group">
        <label class="control-label col-sm-2" for="term">Term</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="term" name="term">
                <option value="1">1</option>
                <option value="2">2</option>
            </select>    
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks1">Computer Communication</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks1" name="marks1" placeholder="Enter Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks2">Computer System</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks2" name="marks2" placeholder="Enter Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks3">Web Development</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks3" name="marks3" placeholder="Enter Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>          
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks4">Software Engineering 1</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks4" name="marks4" placeholder="Enter Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>          
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks5">Problem Solving and Programming</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks5" name="marks5" placeholder="Enter Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>          
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marks6">Database-1</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="marks6" name="marks6" placeholder="Enter Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="Add">Add</button>
            <button type="submit" class="btn btn-info" name="save&continue">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
        
            
        
    </div>
    <?php
    /* $stmt = $pdo->prepare('INSERT INTO personaldata (firstname, surname, dob, email)'
      . 'VALUES ( :firstname, :surname :dob, :email) ');
      $criteria = [
      'firstname' => filter_input(INPUT_POST,'firstname'),
      'surname' => filter_input(INPUT_POST,'surname'),
      'dob' => filter_input(INPUT_POST,'dob'),
      'email' => filter_input(INPUT_POST,'email')

      ];

      $stmt->execute($criteria);



      $st= $pdo->prepare('INSERT INTO examdata (computercommunication,computersystem,web1,softwareengineering1,problemsolving,database1,term,)'
      . 'VALUES ( :marks1, :marks2, :marks3, :marks4, :marks5, :marks6, :term) ');
      $cr = [

      'computercommunication' => filter_input(INPUT_POST,'marks1'),
      'computersystem' => filter_input(INPUT_POST,'marks2'),
      'web1' => filter_input(INPUT_POST,'marks3'),
      'softwareengineering1' => filter_input(INPUT_POST,'marks4'),
      'problemsolving' => filter_input(INPUT_POST,'marks5'),
      'database1' => filter_input(INPUT_POST,'marks6'),
      'term' => filter_input(INPUT_POST,'term')
      ];

      $st->execute($cr); */
    ?>
</form> 
<?php include 'footer.php' ?>