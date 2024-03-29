<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'shared/header.php';
include 'admin/connection.php';
?>
<?php
$id = '';
$first_name = '';
$surname = '';
$dob = '';
$email = '';
$courseId = '';


if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    
    // $result=$conn->query("SELECT * FROM personaldata WHERE id=$id");
    $stmt = $conn->prepare("SELECT * FROM personaldata WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();


//check number of rows of result
    //if (($number_of_rows)>0){

    $first_name = $row['first_name'];
    $surname = $row['surname'];
    $dob = $row['dob'];
    $email = $row['email'];
    $courseId = $row['course_id'];

    //}
    //$result1=$conn->query("SELECT * FROM examdata WHERE pid=$id AND term=$term");
//    $number_of_rows1 = $result1->fetch); 
//    if (($number_of_rows1)>0){
    /* $row=$result1->fetch();

      $computercommunication=$row['computercommunication'];
      $computersystem=$row['computersystem'];
      $web1=$row['web1'];
      $problemsolving=$row['problemsolving'];
      $softwareengineering1=$row['softwareengineering1'];
      $database1=$row['database1'];
      $term=$row['term']; */

//}
}
?>
<div class="page-header">
    <h1>Edit Student Details</h1>
</div>
<form class="form-horizontal col-md-10" action="update.php"
      method="post" name="studentmarks">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />

    <div class="form-group">
        <label class="control-label col-sm-2" for="firstname">First Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="firstname" name="firstname" 
                   placeholder="Enter your First Name" value="<?php echo $first_name; ?>" 
                   ondrop="return false;" onpaste="return false;">         
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="surname">Surname</label>
        <div class="col-sm-10"> 
            <input type="text" class="form-control" id="surname" name="surname" 
                   placeholder="Enter your Surname" value="<?php echo $surname; ?>" 
                   ondrop="return false;" onpaste="return false;">

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="dob">Date of Birth</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="dob" name="dob"
                   placeholder="Enter your Date of Birth" value="<?php echo $dob; ?>">

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" 
                   placeholder="Enter your Email Address" value="<?php echo $email; ?>"
                   ondrop="return false;" onpaste="return false;" />         
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="course">Course</label>
        <div class="col-sm-3"> 
            <select class="form-control" id="course" name="course">
            <option value="">Select Course</option>
                <?php
                $result = $conn->query('SELECT * FROM courses WHERE is_deleted=false');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $id = $row['id'];
                    $name = $row['name'];
                    ?>                       
                    <option value="<?php echo $id; ?>" <?php if ($courseId == $id) { ?>selected<?php } ?>>
                        <?php echo $name; ?></option> 
                    <?php
                }
                ?>

            </select>    
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="update">Update</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form> 
<?php 
include 'shared/footer.php'; 
?>