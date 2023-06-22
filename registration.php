<?php
include 'header.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container">
  <h2>Registration</h2>
  <form action="" name="registration">

    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname" placeholder="John"/>

    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname" placeholder="Doe"/>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="john@doe.com"/>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;"/>

    <button type="submit">Register</button>

  </form>
</div>
<script src="js/form-validation.js"></script>
<?php include 'footer.php'; ?>

