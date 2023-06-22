<?php
ob_start();
include '../shared/header.php';
include '../connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$username= '';
$email = '';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM users WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    //if id not found show error user not found
    if(!$row){
        echo '<div class="alert alert-danger" role="alert">User not found</div>';
        die();
    } 
    if ($row) {
        $username = $row['username'];
        $email = $row['email'];
        $roleId = $row['role_id'];
    }
}

?>
<div class="row justify-content-center">
    <form class="form-horizontal" method="POST" action="">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" 
                value="<?php echo $username; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" 
                value="<?php echo $email; ?>" required>
            </div>
        </div>
        
        <div class="form-group">
            <label class="control-label col-sm-2" for="role">Role</label>
            <div class="col-sm-3"> 
                <select class="form-control" id="role" name="role">
                    <?php
                    $result = $conn->query('SELECT * FROM roles WHERE is_deleted=false');

                    while ($row = $result->fetch()) {
                    //unset($id,$name);
                    $idRole=$row['id'];
                    $name = $row['name'];
                    // select option if equa; to $roleId
                    if ($idRole == $roleId) {
                        echo '<option value="' . $idRole . '" selected>' . $name . '</option>';
                    } else
                        echo '<option value="' . $idRole . '">' . $name . '</option>';
                    }
                    ?>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <button type="submit" class="btn btn-default" name="save">Save</button>
                <a href="index.php"><span class="btn btn-danger" name="cancel">Cancel</span></a>
            </div>
        </div>

    </form>
</div>
<?php
if (isset($_POST['save'])) {
    $sql = "UPDATE users SET username=:username, email=:email, role_id=:roleId WHERE id=$id";
    $criteria = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],   
        'roleId' => $_POST['role']
    ];
    $stmt = $conn->prepare($sql);
    $stmt->execute($criteria);
    header("location:index.php");
    die();
    ob_end_flush();
}
include '../shared/footer.php';
?>