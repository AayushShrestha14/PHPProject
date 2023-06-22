<?php
ob_start();
    include '../shared/header.php';
    include '../connection.php'; 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id = '';
$title = '';
$fullMarks = '';
$passMarks = '';
$practicalMarks = '';
$vivaMarks = '';
$remarks = '';
?>
<script>
    function hidePracticalMarks(value){
        if(value=='yes'){
            document.getElementById('practicalMarksBlock').style.display='block';
            $('#practicalMarks').prop('required', true)  
        }else{
            document.getElementById('practicalMarksBlock').style.display='none';
            $('#practicalMarks').prop('required', false)
        }
    }
</script>
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $stmt = $conn->prepare("SELECT * FROM module_details WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();

    //get title from modules table with code column as foreign key to modules primary key code
    $code = $row['code'];
    $stmt1 = $conn->prepare("SELECT title FROM modules WHERE code=:code");
    $stmt1->bindParam(':code', $code);
    $stmt1->execute();
    $title = $stmt1->fetchColumn();
    $fullMarks = $row['full_marks'];
    $passMarks = $row['pass_marks'];
    $practicalMarks = $row['practical_marks'];
    if($practicalMarks) {
        echo '<script>
        window.addEventListener("DOMContentLoaded", function() {
            var radioButton = document.getElementById("practicalMarksYes");
            if (radioButton) {
                radioButton.checked = true;
              }
            hidePracticalMarks("yes");
          });
          </script>';
    } else {
        echo '<script>
        window.addEventListener("DOMContentLoaded", function() {
            var radioButton = document.getElementById("practicalMarksNo");
            if (radioButton) {
                radioButton.checked = true;
              }
            hidePracticalMarks("no");
          });
        </script>';
        
    }
    $vivaMarks = $row['viva_marks'];
    $remarks = $row['remarks'];
}
?>
<div class="page-header">
    <h1>Edit Module Detail</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="editModuleDetailsForm">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group"><label class="control-label col-sm-2" for="moduleTitle">Module Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="moduleTitle" name="moduleTitle" 
                   value="<?php echo $title; ?>" placeholder="Enter Module Title" 
                   ondrop="return false;" onpaste="return false;" readonly>
        </div>   
    </div>
                    
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="fullMarks">Full Marks</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="fullMarks" name="fullMarks" 
                       placeholder="Enter Full Marks" value="<?php echo $fullMarks; ?>"
                       min='0' max='100' ondrop="return false;" onpaste="return false;" 
                       onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>           
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="passMarks">Pass Marks</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="passMarks" name="passMarks" placeholder="Enter Pass Marks" 
                       min='0' max='100' ondrop="return false;" onpaste="return false;" value="<?php echo $passMarks; ?>"
                       onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>           
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="practicalMarks">Practical Marks</label>
            <div class="col-sm-10 form-check">
                <label class="form-check-label" for="practicalMarksYes">
                    Yes
                </label>
                <input type="radio" class="form-check-input" id="practicalMarksYes" name="practicalMarksChecked" value="yes"
                    onclick="hidePracticalMarks('yes')" >
                
                <label class="form-check-label" for="practicalMarksNo">
                    No
                </label>
                <input type="radio" class="form-check-input" id="practicalMarksNo" name="practicalMarksChecked" value="no" 
                    onclick="hidePracticalMarks('no')" >
            </div>
            
            <div id="practicalMarksBlock">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="practicalMarks" name="practicalMarks" placeholder="Enter Practical Marks" 
                        min='0' max='100' ondrop="return false;" onpaste="return false;" value="<?php echo $practicalMarks; ?>"
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57' >         
                </div>
            </div>          
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="vivaMarks">Viva Marks</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="vivaMarks" name="vivaMarks" placeholder="Enter Viva Marks" 
                       min='0' max='100' ondrop="return false;" onpaste="return false;" value="<?php echo $vivaMarks; ?>"
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
                <button type="submit" class="btn btn-info" name="save">Save</button>
                <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
            </div>
        </div>
</form>
<?php
if (isset($_POST['save'])) {
    $practicalMarksChecked = $_POST['practicalMarksChecked'];
    if ($practicalMarksChecked == 'yes') {
        $practicalMarks = $_POST['practicalMarks'];
    } else {
        $practicalMarks = null;
    }
    $sql = "UPDATE module_details SET full_marks=:fullMarks,pass_marks=:passMarks,"
            . "practical_marks=:practicalMarks,viva_marks=:vivaMarks,remarks=:remarks WHERE id=$id";
    $criteria = [
        'fullMarks' => $_POST['fullMarks'],
        'passMarks' => $_POST['passMarks'],
        'practicalMarks' => $practicalMarks,    
        'vivaMarks' => $_POST['vivaMarks'],
        'remarks' => $_POST['remarks'],
    ];
    $stmt = $conn->prepare($sql);
    $stmt->execute($criteria);
    header("Location: index.php");
    die(); 
    
}
?>
<?php
include "../shared/footer.php";
ob_end_flush();
?>
