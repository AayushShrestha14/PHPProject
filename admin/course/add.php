<?php
ob_start();
include "../shared/header.php";
include "../connection.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="page-header">
    <h1>Add Course</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="addCourseForm">
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Course Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" 
                   placeholder="Enter Course Name" ondrop="return false;" onpaste="return false;" required>        
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="deptId">Department</label>
        <div class="col-sm-10">
            <select class="form-control" id="deptId" name="deptId" required>
                <option value="">Select Department</option>
                <?php
                $stmt = $conn->prepare("SELECT * FROM dept WHERE is_deleted=false");
                $stmt->execute();
                $rows = $stmt->fetchAll();
                foreach ($rows as $row) {
                    ?>
                    <option value="<?php echo $row['id']; ?>" >
                    <?php echo $row['name']; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="add">Add Course</button>
            <button type="submit" class="btn btn-info" name="s&cCourse">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
    <?php
    if (isset($_POST['add']) || isset($_POST['s&cCourse'])) {
        //check for unique values of course name
        $stmt = $conn->prepare("SELECT * FROM courses WHERE name=:name");
        $stmt->execute(['name' => $_POST['name']]);
        $row = $stmt->fetch();
        if ($row) {
            echo "<div class='col-md-6 alert alert-danger'>Course already exists</div>";
            die();
        }

        $sql = "INSERT INTO courses (name, dept_id) VALUES (:name, :deptId)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'name' => $_POST['name'],
            'deptId'=> $_POST['deptId']
        ];
        $stmt->execute($criteria);
        if (isset($_POST['add'])) {
            header("location:index.php");
            die();
        }
    }
    ?>
    <?php
    include "../shared/footer.php";
    ob_end_flush();
    ?>