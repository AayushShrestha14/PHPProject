<?php
include "header.php";
include "connection.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="page-header">
    <h1>Edit Exam</h1>
</div>
<?php
$id = 0;
$name = '';
$fullmarks = '';
$passmarks = '';
$practicalmarks = '';
$vivamarks = '';
$remarks = '';
$term = '';
$examid = '';
$subjectid = '';

if (isset($_GET['editsubjectexam'])) {
    $id = $_GET['editsubjectexam'];

    $stmt = $conn->prepare("SELECT * FROM exam_subject WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $subjectid = $row['subjectid'];
    $examid = $row['examid'];
    $term = $row['term'];
    $fullmarks = $row['fullmarks'];
    $passmarks = $row['passmarks'];
    $practical = $row['practical'];
    $viva = $row['viva'];
    $remarks = $row['remarks'];
}
?>
<form class="form-horizontal col-md-10" action=""
      method="post" name="studentdetails">
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
                    ?>
                    <option value="<?php echo $sid; ?>"<?php if ($subjectid == $sid) { ?> selected <?php } ?>><?php echo $name; ?></option>
                <?php }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="exam">Exam</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="exam" name="exam">
                <?php
                $result = $conn->query('SELECT * FROM exam');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $eid = $row['id'];
                    $name = $row['name'];
                    ?>
                    <option value="<?php echo $eid; ?>"<?php if ($examid == $eid) { ?> selected <?php } ?>><?php echo $name; ?></option>
                <?php }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="term">Term</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="term" name="term">
                <option value="1" <?php if ($term == 1) { ?> selected <?php } ?>>1</option>
                <option value="2" <?php if ($term == 2) { ?> selected <?php } ?>>2</option>
            </select>    
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
            <input type="number" class="form-control" id="passmarks" name="passmarks" 
                   placeholder="Enter Pass Marks" value="<?php echo $passmarks; ?>" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="practicalmarks"> If Practical Marks</label>

        <div class="col-sm-10">
            <input type="radio" class="form-control" id="practicalmarksyes" name="ifpracticalmarks" 
                   value="yes" onclick="hidepracticalmarks('yes')" checked>Yes
            <input type="radio" class="form-control" id="practicalmarksno" name="ifpracticalmarks" 
                   value="no" onclick="hidepracticalmarks('no')" >No
        </div>  
    </div>
    <div class="form-group" id="practicalmarksblock">
        <label class="control-label col-sm-2" for="practicalmarks">Practical Marks</label>

        <div class="col-sm-10">
            <input type="number" class="form-control" id="practicalmarks" name="practicalmarks" 
                   placeholder="Enter Practical Marks" value="<?php echo $practical; ?>"
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="vivamarks">Viva Marks</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="vivamarks" name="vivamarks" 
                   placeholder="Enter Viva Marks" value="<?php echo $viva; ?>"
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
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
            <button type="submit" class="btn btn-info" name="updatesubjectexam">Update Subject Exam</button>
            <a href="indexsubjectexam.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
<?php
if (isset($_POST['updatesubjectexam'])) {
    $id = $_GET['editsubjectexam'];
    $sql = "UPDATE exam_subject SET subjectid=:subject,examid=:exam,FullMarks=:fullmarks,"
            . "PassMarks=:passmarks,Practical=:practicalmarks,Viva=:vivamarks,Remarks=:remarks,term=:term WHERE id=$id";
    $criteria = [
        'subject' => $_POST['subject'],
        'exam' => $_POST['exam'],
        'fullmarks' => $_POST['fullmarks'],
        'passmarks' => $_POST['passmarks'],
        'practicalmarks' => $_POST['practicalmarks'],
        'vivamarks' => $_POST['vivamarks'],
        'remarks' => $_POST['remarks'],
        'term' => $_POST['term']
    ];
    $stmt = $conn->prepare($sql);
    $stmt->execute($criteria);
    //header("location:indexsubjectexam.php");
}
?>
<?php
include "footer.php";
?>
