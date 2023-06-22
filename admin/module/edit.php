<?php
ob_start();
    include '../shared/header.php';
    include '../connection.php'; 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id = '';
$code = '';
$title = '';
$credits = '';
$status = '';
?>
<?php
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $stmt = $conn->prepare("SELECT * FROM modules WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $code = $row['code'];
    $title = $row['title'];
    $credits = $row['credits'];
    $status = $row['status'];
}
?>
<div class="page-header">
    <h1>Edit Module</h1>
</div>
    <form class="form-horizontal col-md-10" action=""
        method="post" name="editModuleForm">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />

        <div class="form-group"><label class="control-label col-sm-2" for="code">Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="code" name="code" 
                    value="<?php echo $code; ?>" placeholder="Enter Code" ondrop="return false;" onpaste="return false;">
            </div>   
        </div>

        <div class="form-group"><label class="control-label col-sm-2" for="moduleTitle">Module Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="moduleTitle" name="moduleTitle" 
                    value="<?php echo $title; ?>" placeholder="Enter Module Title" ondrop="return false;" onpaste="return false;">
            </div>   
        </div>
            
        <div class="form-group">
            <label class="control-label col-sm-2" for="status">Credits</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="credits" name="credits" placeholder="Enter Credits" 
                        min='0' max='100' ondrop="return false;" onpaste="return false;" value="<?php echo $credits; ?>"
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
            </div>
        </div>

        <div class="form-group"><label class="control-label col-sm-2" for="status">Status</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="status" name="status" 
                    value="<?php echo $status; ?>" placeholder="Enter Status" ondrop="return false;" onpaste="return false;">
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

    $sql = "UPDATE modules SET code=:code, title=:moduleTitle, credits=:credits, status=:status WHERE id=$id";
    $criteria = [
        'code' => $_POST['code'],
        'moduleTitle' => $_POST['moduleTitle'],
        'credits' => $_POST['credits'],
        'status' => $_POST['status']
    ];
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
