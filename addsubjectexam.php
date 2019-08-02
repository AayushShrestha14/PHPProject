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
    <h1>Add Exam</h1>
</div>
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

                    echo '<option value="' . $sid . '">' . $name . '</option>';
                }
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

                    echo '<option value="' . $eid . '">' . $name . '</option>';
                }
                ?>
            </select>    
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
        <label class="control-label col-sm-2" for="fullmarks">Full Marks</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="fullmarks" name="fullmarks" placeholder="Enter Full Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="passmarks">Pass Marks</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="passmarks" name="passmarks" placeholder="Enter Pass Marks" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="practicalmarks"> If Practical Marks</label>
        <div class="col-sm-10">
            <input type="radio" class="form-control" id="ifpracticalmarksyes" name="ifpracticalmarks" value="yes" onclick="hidepracticalmarks('yes')" checked/>Yes
            <input type="radio" class="form-control" id="ifpracticalmarksno" name="ifpracticalmarks" value="no" onclick="hidepracticalmarks('no')" />No
        </div>  
    </div>
    <div class="form-group" id="practicalmarksblock">
        <label class="control-label col-sm-2" for="practicalmarks">Practical Marks</label>

        <div class="col-sm-10">
            <input type="number" class="form-control" id="practicalmarks" name="practicalmarks" 
                   placeholder="Enter Practical Marks" min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="vivamarks">Viva Marks</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="vivamarks" name="vivamarks" placeholder="Enter Viva Marks" 
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
            <button type="submit" class="btn btn-info" name="addsubjectexam">Add Subject Exam</button>
            <button type="submit" class="btn btn-info" name="save&continuesubexam">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>

<?php
$practicalmarks = 0;
if (isset($_POST['addsubjectexam'])) {
    if ($_POST['ifpracticalmarks'] == 'yes') {
        $practicalmarks = $_POST['practicalmarks'];
    }
    $sql = "INSERT INTO exam_subject (subjectid,examid,FullMarks,PassMarks,Practical,Viva,Remarks,term) 
    VALUES (:subject,:exam,:fullmarks,:passmarks,:practicalmarks,:vivamarks,:remarks,:term)";
    $criteria = [
        'subject' => $_POST['subject'],
        'exam' => $_POST['exam'],
        'fullmarks' => $_POST['fullmarks'],
        'passmarks' => $_POST['passmarks'],
        'practicalmarks' => $practicalmarks,
        'vivamarks' => $_POST['vivamarks'],
        'remarks' => $_POST['remarks'],
        'term' => $_POST['term']
    ];
    $stmt = $conn->prepare($sql);
    $stmt->execute($criteria);
    //header("location:index.php");
}
if (isset($_POST['save&continuesubexam'])) {
    if ($_POST['ifpracticalmarks'] == 'yes') {
        $practicalmarks = $_POST['practicalmarks'];
    }
    $sql = "INSERT INTO exam_subject (subjectid,examid,FullMarks,PassMarks,Practical,Viva,Remarks,term) "
            . "VALUES (:subject,:exam,:fullmarks,:passmarks,:practicalmarks,:vivamarks,:remarks,:term)";
    $criteria = [
        'subject' => $_POST['subject'],
        'exam' => $_POST['exam'],
        'fullmarks' => $_POST['fullmarks'],
        'passmarks' => $_POST['passmarks'],
        'practicalmarks' => $practicalmarks,
        'vivamarks' => $_POST['vivamarks'],
        'remarks' => $_POST['remarks'],
        'term' => $_POST['term']
    ];
    $stmt = $conn->prepare($sql);
    $stmt->execute($criteria);
    //header("location:index.php");
}
?>
<?php
include "footer.php";
?>
