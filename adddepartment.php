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
    <h1>Add Department</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="studentdetails">
    <div class="form-group">
        <label class="control-label col-sm-2" for="departmentname">Department Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="departmentname" name="departmentname" 
                   placeholder="Enter Department Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="adddepartment">Add Department</button>
            <button type="submit" class="btn btn-info" name="save&continuedept">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <?php
    if (isset($_POST['adddepartment'])) {

        $sql = "INSERT INTO department (name) VALUES (:departmentname)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'departmentname' => $_POST['departmentname']
        ];
        $stmt->execute($criteria);
        die();
        //header("location:index.php");
    }
    if (isset($_POST['save&continuedept'])) {
        $sql = "INSERT INTO department (name) VALUES (:departmentname)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'departmentname' => $_POST['departmentname']
        ];
        $stmt->execute($criteria);
        die();
        //header("location:index.php");
    }
    ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="departmentname">Department Name</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="departmentnamelist" name="departmentnamelist">
                <?php
                $result = $conn->query('SELECT * FROM department');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $did = $row['Deptid'];
                    $name = $row['name'];

                    echo '<option value="' . $did . '">' . $name . '</option>';
                }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="course">Course</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="course" name="course">
                <?php
                $result = $conn->query('SELECT * FROM course');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $cid = $row['Courseid'];
                    $name = $row['name'];

                    echo '<option value="' . $cid . '">' . $name . '</option>';
                }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="assigndepartment">Assign Department</button>
            <button type="submit" class="btn btn-info" name="save&continuedeptassign">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <?php
    if (isset($_POST['assigndepartment'])) {

        $sql = "INSERT INTO department_course (deptid,courseid) VALUES (:departmentnamelist,:course)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'departmentnamelist' => $_POST['departmentnamelist'],
            'course' => $_POST['course']
        ];
        $stmt->execute($criteria);
        //die();
        //sheader("location:index.php");
    }
    if (isset($_POST['save&continuedeptassign'])) {
        $sql = "INSERT INTO department_course (deptid,courseid) VALUES (:departmentnamelist,:course)";
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
                $department_courseQuery = $conn->prepare('SELECT * FROM department_course');
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
                    //echo $department['name'];
//            $departmentQuery = $conn->prepare('SELECT name FROM faculties');
//            $courseQuery = $conn->prepare('SELECT name FROM courses WHERE id = :courseid');
//            $departmentQuery->execute();
//
//            while ($department = $departmentQuery->fetch()) {
//                $courseCriteria = [
//                    'id' => $department['id']
//                ];
//                $courseQuery->execute($courseCriteria);
//                $course = $courseQuery->fetch();


                    echo '<td>' . $department['name'] . '</td>' .
                    '<td>' . $course['name'] . '</td>';
                    
                    ?>
                
                    <td>
                        <a href="editdepartment.php?edit=<?php echo $department['id']; ?>" class="btn btn-success btn-xs" title="Edit">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="deletedepartment.php?delete=<?php echo $personal['id'] ?>&term=<?php echo $exam['term']; ?>" class="btn btn-danger btn-xs" title="Delete"
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
