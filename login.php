<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'header.php';
?>
<form class="form-horizontal" method="POST" action="login.php">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default" name="login">Sign in</button>
        </div>
    </div>
</form>
<?php

if (isset($_POST['login'])) {
//    $sql = "SELECT email,password FROM personaldata";
//    $stmt = $conn->prepare($sql);
//    $stmt->execute();
//
//    while ($row = $stmt->fetch()) {
//        
//        if (($row['email'] == $_POST['email']) && ($row['password'] == $_POST['password'])) {
//            $_SESSION['email']==$row['email'];
            //echo $_SESSION['email'];
        //}
        //echo "Welcome " . "Your email address is " . $_SESSION['email'];
    if($_POST['email']=='admin@gmail.com' && $_POST['password']=='admin'){
        
        $_SESSION["loggedin"]==$_POST['email'];
        echo 'You have logged in successfully';
    }
}
?>
<?php include 'footer.php'; ?>