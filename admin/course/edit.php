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
    <h1>Edit Course</h1>
</div>
<?php
$id = '';
$name = '';
$deptId = '';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $stmt = $conn->prepare("SELECT * FROM courses WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $id = $row['id'];
    $name = $row['name'];
    $deptId = $row['dept_id'];

}
?>
<form class="form-horizontal col-md-10" action=""
      method="post" name="editCourseForm">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Course Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>"
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
                    <option value="<?php echo $row['id']; ?>" <?php if ($deptId == $row['id']) { ?>selected<?php } ?>>
                    <?php echo $row['name']; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="update">Update Course</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
<?php
if (isset($_POST['update'])) {
    $sql = "UPDATE courses SET name=:name,dept_id=:deptId WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $criteria = [
        'name' => $_POST['name'],
        'deptId'=> $_POST['deptId']
    ];
    $stmt->execute($criteria);
    header("Location:index.php");
    die();
}

?>
<?php
include "../shared/footer.php";
ob_end_flush();
?>