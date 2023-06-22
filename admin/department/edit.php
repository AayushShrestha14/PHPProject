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
    <h1>Edit Department</h1>
</div>
<?php
$id = '';
$name = '';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    
     
    //to display department name in text field
    $stmt = $conn->prepare("SELECT * FROM dept WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $name = $row['name'];
    
}
?>

<form class="form-horizontal col-md-10" action=""
      method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group">
        <label class="control-label col-sm-2" for="departmentName">Department Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="departmentName" name="departmentName" value="<?php echo $name; ?>"
                   placeholder="Enter Department Name" ondrop="return false;" onpaste="return false;" required>        
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

    $sql = "UPDATE dept SET name=:departmentName WHERE id=$id";
    $criteria = [
        'departmentName' => $_POST['departmentName']
    ];
    //check dept name for unique value
    $stmt = $conn->prepare("SELECT * FROM dept WHERE name=:departmentName");
    $stmt->execute(['departmentName' => $_POST['departmentName']]);
    $row = $stmt->fetch();
    if ($row) {
        if ($row['name'] == $_POST['departmentName']) {
            echo "<script>alert('Department Name already exists!');</script>";
            die();
        }
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute($criteria);
    header("location:index.php");
    die();
}
?>

<?php
include "../shared/footer.php";
ob_end_flush();
?>
