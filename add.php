<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'header.php';
include 'connection.php';
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
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-3">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="role">Role</label>
        <div class="col-sm-3"> 
            <select class="form-control" id="role" name="role">
                <?php
                $result = $conn->query('SELECT * FROM role');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $id = $row['Roleid'];
                    $name = $row['name'];
                   
                    echo '<option value="' . $id . '">' . $name . '</option>';
               }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
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
    /* $stmt = $conn->prepare('INSERT INTO personaldata (firstname, surname, dob, email)'
      . 'VALUES ( :firstname, :surname :dob, :email) ');
      $criteria = [
      'firstname' => filter_input(INPUT_POST,'firstname'),
      'surname' => filter_input(INPUT_POST,'surname'),
      'dob' => filter_input(INPUT_POST,'dob'),
      'email' => filter_input(INPUT_POST,'email')
      ];

      $stmt->execute($criteria);

      $st= $conn->prepare('INSERT INTO examdata (computercommunication,computersystem,web1,softwareengineering1,problemsolving,database1,term,)'
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