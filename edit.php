<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'header.php';?>
<div class="page-header">
    <h1>Edit Student Details</h1>
</div>
<form class="form-horizontal" action="index.php" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="firstname">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your First Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="surname">Surname</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Surname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="dob">Date of Birth</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="dob" name="dob" placeholder="Enter your Date of Birth">
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="control-label col-sm-2" for="subject1">Subject1</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" id="subject1" name="subject1" placeholder="Enter Subject1">
                    </div>
                </div>-->
                <div class="form-group">

                    <label for="subject" class="control-label col-sm-2">Subject 1:</label>
                    <div class="col-sm-offset-2 col-sm-10">
                        <select class="form-control" id="subject1">
                            <option>SE</option>
                            <option>SDD</option>
                            <option>Database-1</option>
                            <option>Web Programming</option>
                            <option>Computer Communication</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-2" for="marks1">Marks1</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="marks1" name="marks1" placeholder="Enter Marks1">
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="control-label col-sm-2" for="subject2">Subject2</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" id="subject2" name="subject2"placeholder="Enter Subject2">
                    </div>
                </div>-->
                <div class="form-group">

                    <label for="subject" class="control-label col-sm-2">Subject 2:</label>
                    <div class="col-sm-offset-2 col-sm-10">
                        <select class="form-control" id="subject2">
                            <option>SE</option>
                            <option>SDD</option>
                            <option>Database-1</option>
                            <option>Web Programming</option>
                            <option>Computer Communication</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-2" for="marks2">Marks2</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="marks2" name="marks2"placeholder="Enter Marks2">
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="control-label col-sm-2" for="subject3">Subject3</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" id="subject3" name="subject3" placeholder="Enter Subject3">
                    </div>
                </div>-->
                <div class="form-group">

                    <label for="subject" class="control-label col-sm-2">Subject 3:</label>
                    <div class="col-sm-offset-2 col-sm-10">
                        <select class="form-control" id="subject3">
                            <option>SE</option>
                            <option>SDD</option>
                            <option>Database-1</option>
                            <option>Web Programming</option>
                            <option>Computer Communication</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-2" for="marks3">Marks3</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="marks3" name="marks3"placeholder="Enter Marks3">
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Subject4</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" id="subject4" name="subject4"placeholder="Enter Subject4">
                    </div>
                </div>-->
                <div class="form-group">

                    <label for="subject" class="control-label col-sm-2">Subject 4:</label>
                    <div class="col-sm-offset-2 col-sm-10">
                        <select class="form-control" id="subject4">
                            <option>SE</option>
                            <option>SDD</option>
                            <option>Database-1</option>
                            <option>Web Programming</option>
                            <option>Computer Communication</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-2" for="marks4">Marks4</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="marks4" name="marks4"placeholder="Enter Marks4">
                    </div>
                </div>
                <!--<div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Subject5</label>
                    <div class="col-sm-10"> 
                        <input type="text" class="form-control" id="subject5" name="subject5"placeholder="Enter Subject5">
                    </div>
                </div>-->
                <div class="form-group">

                    <label for="subject" class="control-label col-sm-2">Subject 5:</label>
                    <div class="col-sm-offset-2 col-sm-10">
                        <select class="form-control" id="subject5">
                            <option>SE</option>
                            <option>SDD</option>
                            <option>Database-1</option>
                            <option>Web Programming</option>
                            <option>Computer Communication</option>
                        </select>
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-sm-2" for="marks2">Marks5</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="marks5" name="marks5"placeholder="Enter Marks5">
                    </div>


                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default" name="submit">Submit</button>
                    </div>
                </div>


            </form> 
        <?php include 'footer.php' ?>