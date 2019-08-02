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
    <h1>Edit Department</h1>
</div>
<?php
$id = 0;
$name = '';
$departmentid = '';
$courseid = '';

if (isset($_GET['editdepartment'])) {
    $id = $_GET['editdepartment'];
    $courseid= $_GET['course'];
    
   
    //to display department name in text field
    $stmt = $conn->prepare("SELECT * FROM department WHERE Deptid=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $departmentid = $row['Deptid'];
    $name = $row['name'];
    
}
?>

<form class="form-horizontal col-md-10" action=""
      method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group">
        <label class="control-label col-sm-2" for="departmentname">Department Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="departmentname" name="departmentname" value="<?php echo $name; ?>"
                   placeholder="Enter Department Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="updatedepartment">Update Department</button>
            <a href="indexdepartment.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="departmentname">Department Name</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="departmentnamelist" name="departmentnamelist">
                <?php
                $result = $conn->query('SELECT * FROM department WHERE isdeleted=0');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $did = $row['Deptid'];
                    $name = $row['name'];
                    ?>
                    <option value="<?php echo $did; ?>"<?php if ($departmentid == $did) { ?> selected <?php } ?>><?php echo $name; ?></option>
                <?php }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="course">Course</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="course" name="course">
                <?php
               
                $result = $conn->query('SELECT * FROM course WHERE isdeleted=0');
                
                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $cid = $row['Courseid'];
                    $name = $row['name'];
                    ?>
                    <option value="<?php echo $cid; ?>"<?php if ($courseid == $cid) { ?> selected <?php } ?>><?php echo $name; ?></option>
                <?php }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="assigndepartmentupdate">Assign Department</button>
            <a href="adddepartment.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
<?php
if (isset($_POST['updatedepartment'])) {

    $sql = "UPDATE faculties SET name=:departmentname WHERE id=$departmentid";
    $stmt = $conn->prepare($sql);
    $criteria = [
        'departmentname' => $_POST['departmentname']
    ];
    $stmt->execute($criteria);
    die();
    header("location:editdepartment.php");
}
if (isset($_POST['assigndepartmentupdate'])) {

    $sql = "UPDATE department_course SET departmentid=:departmentnamelist,courseid=:course WHERE departmentid=:departmentnamelist";
    $stmt = $conn->prepare($sql);
    $criteria = [
        'departmentnamelist' => $_POST['departmentnamelist'],
        'course' => $_POST['course']
    ];
    $stmt->execute($criteria);
    //die();
    //header("location:index.php");
}
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Department Name</th>
            <th>Course</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $department_courseQuery = $conn->prepare('SELECT * FROM department_course WHERE isdeleted=0');
            $department_courseQuery->execute();


            foreach ($department_courseQuery as $row) {
                $departmentid = $row['deptid'];
                $departmentQuery = $conn->prepare("SELECT * FROM department WHERE Deptid='$departmentid'");
                $departmentQuery->execute();
                $department = $departmentQuery->fetch();

                $courseid = $row['courseid'];
                $courseQuery = $conn->prepare("SELECT * FROM course WHERE Courseid='$courseid'");
                $courseQuery->execute();

                $course = $courseQuery->fetch();

                echo '<td>' . $department['name'] . '</td>' .
                '<td>' . $course['name'] . '</td>';
                ?>
                <td>
                    <a href="editdepartment.php?editdepartment=<?php echo $department['Deptid']; ?>&course=<?php echo $course['Courseid']; ?>" class="btn btn-success btn-xs" title="Edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="deletedepartment.php?delete=<?php echo $department['Deptid'] ?>&course=<?php echo $course['Courseid']; ?>" class="btn btn-danger btn-xs" title="Delete"
                       onclick="return confirm('Are you sure to Delete ?');">
                        <span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php
            //}
        }
        ?>      
    </tbody>
</table>    

<?php
include "footer.php";
?>
