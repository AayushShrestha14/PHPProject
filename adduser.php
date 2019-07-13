<?php
include 'header.php';
include 'connection.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row justify-content-center">
    <form class="form-horizontal" method="POST" action="">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-3">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="role">Role</label>
            <div class="col-sm-3"> 
                <select class="form-control" id="role" name="role">
                    <?php
                    $result = $conn->query('SELECT * FROM role');

                    while ($row = $result->fetch()) {
                    unset($id,$name);
                    $id=$row['id'];
                    $name = $row['name'];
                    //echo $name;
                    ?>
<!--                    <option value="1">Admin</option>
                    <option value="2">Faculty</option>
                    <option value="3">Student</option>-->
                    <?php
                    echo '<option value="' . $id . '">' . $name . '</option>';
                    }
                    ?>
                </select>    
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <button type="submit" class="btn btn-default" name="signup">Sign up</button>
                <a href="login.php"><span class="btn btn-danger" name="cancel">Cancel</span></a>
            </div>
        </div>

    </form>
</div>
<?php
if (isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $roleid = $_POST['role'];
    echo $email, $password, $roleid;
    $sql = "INSERT INTO personaldata (email,password,roleid) VALUES ('$email','$password','$roleid')";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
//header("location:login.php");
}
include 'footer.php';
?>