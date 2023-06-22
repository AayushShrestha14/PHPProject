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
    <h1>Edit Faculty</h1>
</div>
<?php
$id = '';
$name = '';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    
    //to display faculty name in text field
    $stmt = $conn->prepare("SELECT * FROM faculties WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $id = $row['id'];
    $name = $row['name'];
    
}
?>

<form class="form-horizontal col-md-10" action=""
      method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group">
        <label class="control-label col-sm-2" for="facultyname">Faculty Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>"
                   placeholder="Enter Faculty Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="update">Update Faculty</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
<?php
if (isset($_POST['update'])) {

    $sql = "UPDATE faculties SET name=:name WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $criteria = [
        'name' => $_POST['name']
    ];
    $stmt->execute($criteria);
    header("location:index.php");
    die();
}
ob_end_flush();
?>

<?php
include "../shared/footer.php";
?>
