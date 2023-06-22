<?php 
    ob_start();
    include '../shared/header.php';
    include '../connection.php'; 
?>

<div class="page-header">
    <h1>Add Module</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="addModuleForm">
      <div class="form-group">
        <label class="control-label col-sm-2" for="code">Code</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code" 
                   ondrop="return false;" onpaste="return false;" >           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="moduleTitle">Module Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="moduleTitle" name="moduleTitle" 
                   placeholder="Enter Module Title" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="credits">Credits</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="credits" name="credits" placeholder="Enter Credits" 
                   min='0' max='100' ondrop="return false;" onpaste="return false;" 
                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'>           
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status">Status</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="status" name="status" placeholder="Enter Status" 
                   ondrop="return false;" onpaste="return false;" >           
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="addModule">Add</button>
            <button type="submit" class="btn btn-info" name="s&cModule">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
    <?php
    if((isset($_POST['addModule'])) || isset($_POST['s&cModule'])) {
    
    $sql="INSERT INTO modules (code, title, credits, status) 
        VALUES (:code, :title, :credits, :status)";
    $criteria=[
        'code' => $_POST['code'],
        'title' => $_POST['moduleTitle'],
        'credits' => $_POST['credits'],
        'status' => $_POST['status']
    ];
    $stmt=$conn->prepare($sql);
    $stmt->execute($criteria);
    
    if(isset($_POST['addModule'])){
        header("Location: index.php");
        die();
    }
    }
    ?>
<?php
include "../shared/footer.php";
ob_end_flush();
?>