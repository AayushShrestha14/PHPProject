<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'header.php';
?>
<?php
$id = 0;
$name = '';
$facultyid='';
$subjectid='';

if (isset($_GET['editfaculty1'])) {
    $id = $_GET['editfaculty1'];
    $subjectid = $_GET['subject'];
    
    $stmt = $conn->prepare("SELECT * FROM faculties WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $facultyid = $row['id'];
    $facultyname = $row['name'];
    
}
?>
<div class="page-header">
    <h1>Edit Faculty</h1>
</div>

<form class="form-horizontal col-md-10" action=""
      method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group">
        <label class="control-label col-sm-2" for="facultyname">Faculty Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="facultyname" name="facultyname" value="<?php echo $name; ?>"
                   placeholder="Enter Faculty Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="updatefaculty">Update Faculty</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="facultyname">Faculty Name</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="facultynamelist" name="facultynamelist">
                <?php
                $result = $conn->query('SELECT * FROM faculties WHERE isdeleted=0');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $fid = $row['id'];
                    $facultyname = $row['name'];
                    ?>
                    <option value="<?php echo $fid; ?>"<?php if ($facultyid == $fid) { ?> selected <?php } ?>><?php echo $facultyname; ?></option>
                <?php }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="subject">Subject</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="subject" name="subject">
                <?php
               
                $result = $conn->query('SELECT * FROM subjects WHERE isdeleted=0');
                
                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $sid = $row['id'];
                    $subjectname = $row['name'];
                    ?>
                    <option value="<?php echo $sid; ?>"<?php if ($subjectid == $sid) { ?> selected <?php } ?>><?php echo $subjectname; ?></option>
                <?php }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="assignfacultyupdate">Assign Faculty</button>
            <button type="submit" class="btn btn-info" name="save&continuefacassignupdate">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>    
<?php
include 'footer.php';
?>