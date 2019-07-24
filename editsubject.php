<?php
include "header.php";
include "connection.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id = 0;
$name = '';
$fullmarks = '';
$passmarks = '';
$practicalmarks = '';
$vivamarks = '';
$remarks = '';
?>
<?php
if (isset($_GET['editsubject'])) {
    $id = $_GET['editsubject'];

    $stmt = $conn->prepare("SELECT * FROM subjects WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $subjectid = $row['id'];
    $name = $row['name'];
    $fullmarks = $row['FullMarks'];
    $passmarks = $row['PassMarks'];
    $practicalmarks = $row['Practical'];
    $vivamarks = $row['Viva'];
    $remarks = $row['Remarks'];
}
?>
<div class="page-header">
    <h1>Edit Subject</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="studentdetails">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group"><label class="control-label col-sm-2" for="subjectname">Subject Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="subjectname" name="subjectname" 
                   value="<?php echo $name; ?>" placeholder="Enter Subject Name" ondrop="return false;" onpaste="return false;">
        </div>   
    </div>
                    
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="fullmarks">Full Marks</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="fullmarks" name="fullmarks" 
                       placeholder="Enter Full Marks" value="<?php echo $fullmarks; ?>"
                       min='0' max='100' ondrop="return false;" onpaste="return false;" 
                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="passmarks">Pass Marks</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="passmarks" name="passmarks" placeholder="Enter Pass Marks" 
                       min='0' max='100' ondrop="return false;" onpaste="return false;" value="<?php echo $passmarks; ?>"
                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="practicalmarks">Practical Marks</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="practicalmarks" name="practicalmarks" placeholder="Enter Practical Marks" 
                       min='0' max='100' ondrop="return false;" onpaste="return false;" value="<?php echo $practicalmarks; ?>"
                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="vivamarks">Viva Marks</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="vivamarks" name="vivamarks" placeholder="Enter Viva Marks" 
                       min='0' max='100' ondrop="return false;" onpaste="return false;" value="<?php echo $vivamarks; ?>"
                       onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="remarks">Remarks</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="remarks" name="remarks" value="<?php echo $remarks; ?>"
                       placeholder="Enter Remarks" ondrop="return false;" onpaste="return false;">        
            </div>
        </div>
        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info" name="updatesubject">Update Subject</button>
                <button type="submit" class="btn btn-info" name="save&continuesubupdate">Save and Continue</button>
                <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
            </div>
        </div>
</form>
<?php
if (isset($_POST['addsubject'])) {
    //$name=$_POST['subjectname'];

    $sql = "INSERT INTO subjects (name,FullMarks,PassMarks,Practical,Viva,Remarks) "
            . "VALUES (:subjectname,:fullmarks,:passmarks,:practicalmarks,:vivamarks,:remarks)";
    $criteria = [
        'subjectname' => $_POST['subjectname'],
        'fullmarks' => $_POST['fullmarks'],
        'passmarks' => $_POST['passmarks'],
        'practicalmarks' => $_POST['practicalmarks'],
        'vivamarks' => $_POST['vivamarks'],
        'remarks' => $_POST['remarks'],
    ];
    $stmt = $conn->prepare($sql);
    $stmt->execute($criteria);
    die();
    header("location:index.php");
}
if (isset($_POST['save&continuesub'])) {
    $sql = "INSERT INTO subjects (name,FullMarks,PassMarks,Practical,Viva,Remarks) "
            . "VALUES (:subjectname,:fullmarks,:passmarks,:practicalmarks,:vivamarks,:remarks)";
    $criteria = [
        'subjectname' => $_POST['subjectname'],
        'fullmarks' => $_POST['fullmarks'],
        'passmarks' => $_POST['passmarks'],
        'practicalmarks' => $_POST['practicalmarks'],
        'vivamarks' => $_POST['vivamarks'],
        'remarks' => $_POST['remarks'],
    ];
    $stmt = $conn->prepare($sql);
    $stmt->execute($criteria);
    die();
    //header("location:index.php");
}
?>
<?php
include "footer.php";
?>
