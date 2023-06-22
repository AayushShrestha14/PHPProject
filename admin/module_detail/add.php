<?php 
ob_start();
    include '../shared/header.php';
    include '../connection.php';
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

<div class="page-header">
    <h1>Add Module Details</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="addModuleDetailsForm">

    <div class="form-group">
        <label class="control-label col-sm-2" for="moduleCodeList">Module</label>
        <div class="col-sm-10">
        <?php
        $sql = "SELECT * FROM modules WHERE is_deleted=false";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $modules = $stmt->fetchAll();
        ?>
         
        <select class="form-control" name="moduleCode" id="moduleCode" title="moduleCode" required>
            <option value="">Select Module</option>
            <?php foreach ($modules as $module) { ?>
                <option value="<?php echo $module['id']; ?>">
                    <?php echo $module['code'] . " (" . $module['title'] . ")"; ?>
                </option>
            <?php } ?>
        </select>
        </div>
    </div>
   
    <div class="form-group">
        <label class="control-label col-sm-2" for="fullmarks">Full Marks</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="fullMarks" name="fullMarks" placeholder="Enter Full Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="passmarks">Pass Marks</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="passMarks" name="passMarks" placeholder="Enter Pass Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>           
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-sm-2" for="practicalMarks">Practical Marks</label>
        <div class="col-sm-10 form-check">
                <label class="form-check-label" for="practicalMarksYes">
                    Yes
                </label>
                <input type="radio" class="form-check-input" id="practicalMarksYes" name="practicalMarksChecked" value="yes" onclick="hidePracticalMarks('yes')" checked>
                  
                <label class="form-check-label" for="practicalMarksNo">
                    No
                </label>
                <input type="radio" class="form-check-input" id="practicalMarksNo" name="practicalMarksChecked" value="no" onclick="hidePracticalMarks('no')" >
        </div>
        <div id="practicalMarksBlock">
        <div class="col-sm-2">
        </div>              
        <div class="col-sm-10">
            <input type="number" class="form-control" id="practicalMarks" name="practicalMarks" placeholder="Enter Practical Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>           
        </div>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="vivaMarks">Viva Marks</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="vivaMarks" name="vivaMarks" placeholder="Enter Viva Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="remarks">Remarks</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="remarks" name="remarks" 
                   placeholder="Enter Remarks" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="addModuleDetails">Add</button>
            <button type="submit" class="btn btn-info" name="s&cModuleDetails">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
    <?php
    if((isset($_POST['addModuleDetails'])) || isset($_POST['s&cModuleDetails'])) {
        $practicalMarksChecked = $_POST['practicalMarksChecked'];
    if ($practicalMarksChecked == 'yes') {
        $practicalMarks = $_POST['practicalMarks'];
    } else {
        $practicalMarks = null;
    }
    $moduleId = $_POST['moduleCode'];
    $stmt1 = $conn->prepare("SELECT code FROM modules WHERE id=:moduleId");
    $stmt1->bindParam(':moduleId', $moduleId);
    $stmt1->execute();
    $moduleCode = $stmt1->fetchColumn();
    $sql="INSERT INTO module_details (code, full_marks, pass_marks, practical_marks, viva_marks, remarks) 
        VALUES (:code,:fullMarks,:passMarks,:practicalMarks,:vivaMarks,:remarks)";


    $criteria=[
        'code' => $moduleCode,
        'fullMarks' => $_POST['fullMarks'],
        'passMarks' => $_POST['passMarks'],
        'practicalMarks' => $practicalMarks,
        'vivaMarks' => $_POST['vivaMarks'],
        'remarks' => $_POST['remarks'],
    ];
    $stmt=$conn->prepare($sql);
    $stmt->execute($criteria);
    
    if(isset($_POST['addModuleDetails'])){
        header("Location: index.php");
        die();
    }
    }
    ?>
<?php
include "../shared/footer.php";
ob_end_flush();
?>