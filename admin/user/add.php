<?php
ob_start();
include '../shared/header.php';
include '../connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="page-header">
    <h1>Add User</h1>
</div>
<div class="row justify-content-center">
    <form class="form-horizontal" method="POST" action="">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="role">Role</label>
            <div class="col-sm-3"> 
                <select class="form-control" id="role" name="role" required>
                    <?php
                    $result = $conn->query('SELECT * FROM roles');
                    echo '<option value="">Select Role</option>';
                    while ($row = $result->fetch()) {
                    unset($id,$name);
                    $id=$row['id'];
                    $name = $row['name'];
                    
                    echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <button type="submit" class="btn btn-default" name="signup">Sign up</button>
                <a href="index.php"><span class="btn btn-danger" name="cancel">Cancel</span></a>
            </div>
        </div>

    </form>
</div>
<?php
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];   
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $roleId = $_POST['role'];
    $sql = "INSERT INTO users (username, email, password, role_id) VALUES ('$username', '$email', '$password', '$roleId')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:index.php");
    die();
    ob_end_flush();
}
include '../shared/footer.php';
?>