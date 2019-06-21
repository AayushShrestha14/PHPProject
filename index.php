<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include 'pdo.php'; ?>
<?php include 'header.php' ?>

            <hr>

            <!--<form method="post" action="index.php" class="form-horizontal">
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Firstname:</label>
                            <div class="col-sm-10">
                            <input type="text" placeholder="Firstname" name="firstname" class="form control" /> <br />
                            </div>
                </div>
                <div class="form-group">
                   
                            <label class="control-label col-sm-2">Surname:</label>
                        <input type="text" placeholder="Surname" name="surname"class="form control" /> <br /></td>
                    
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Date of Birth:</label>
                            <div class="col-sm-10">
                       <input type="date" placeholder="Date of Birth" name="dob" class="form control"/> <br /></td>
                            </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Subject1:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Subject1" name="subject1" class="form control" /> <br /></td>
                    </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Marks1:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Marks1" name="marks1" class="form control"/> <br /></td>
                    </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Subject2:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Subject2" name="subject2" class="form control"/> <br /></td>
                            </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Marks2:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Marks2" name="marks2" class="form control"/> <br /></td>
                            </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Subject3:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Subject3" name="subject3" class="form control"/> <br /></td>
                            </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Marks3:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Marks3" name="marks3"class="form control" /> <br /></td>
                    </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Subject4:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Subject4" name="subject4" class="form control"/> <br /></td>
                    </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Marks4:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Marks4" name="marks4" class="form control"/> <br /></td>
                    </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Subject5:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Subject5" name="subject5" class="form control"/> <br /></td>
                    </div>
                </div>
                <div class="form-group">
                    
                            <label class="control-label col-sm-2">Marks5:</label>
                            <div class="col-sm-10">
                        <input type="text" placeholder="Marks5" name="marks5" class="form control"/> <br /></td>
                            </div></div>
                <input type="submit" class="btn btn-primary"/>
                
                
                    


            </form>-->


            <a href="add.php" class="btn btn-primary glyphicon glyphicon-plus pull-right"></a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Surname</th>
                        <th>Date of Birth</th>
                        <th>Computer Communication</th>
                        <th>Database-1</th>
                        <th>Web Development</th>
                        <th>Software Engineering</th>
                        <th>Formal Specification of System Software</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_POST['firstname']; ?></td>
                        <td><?php echo $_POST['surname']; ?></td>
                        <td><?php echo $_POST['dob']; ?></td>
                        
                        <td><?php echo $_POST['marks1']; ?></td>
                        
                        <td><?php echo $_POST['marks2']; ?></td>
                        
                        <td><?php echo $_POST['marks3']; ?></td>
                        
                        <td><?php echo $_POST['marks4']; ?></td>
                        
                        <td><?php echo $_POST['marks5']; ?></td>
                        <td>
                            <a href="edit.php" class="btn btn-info glyphicon glyphicon-pencil"></a>
                            <a href="delete.php" class="btn btn-danger glyphicon glyphicon-trash"></a>
                        </td>

                    </tr>


                </tbody>
            </table>
            <?php include 'footer.php' ?>