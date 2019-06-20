<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <script src="http://code.jquery.com/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
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



            <table class="table">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Surname</th>
                        <th>Date of Birth</th>
                        <th>Subject1</th>
                        <th>Marks1</th>
                        <th>Subject2</th>
                        <th>Marks2</th>
                        <th>Subject3</th>
                        <th>Marks3</th>
                        <th>Subject4</th>
                        <th>Marks4</th>
                        <th>Subject5</th>
                        <th>Marks5</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_POST['firstname']; ?></td>
                        <td><?php echo $_POST['surname']; ?></td>
                        <td><?php echo $_POST['dob']; ?></td>
                        <td><?php echo $_POST['subject1']; ?></td>
                        <td><?php echo $_POST['marks1']; ?></td>
                        <td><?php echo $_POST['subject2']; ?></td>
                        <td><?php echo $_POST['marks2']; ?></td>
                        <td><?php echo $_POST['subject3']; ?></td>
                        <td><?php echo $_POST['marks3']; ?></td>
                        <td><?php echo $_POST['subject4']; ?></td>
                        <td><?php echo $_POST['marks4']; ?></td>
                        <td><?php echo $_POST['subject5']; ?></td>
                        <td><?php echo $_POST['marks5']; ?></td>

                    </tr>


                </tbody>
            </table>

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

                    <label for="subject" class="control-label col-sm-2">Select subject:</label>
                    <div class="col-sm-offset-2 col-sm-10">
                        <select class="form-control" id="subject">
                            <option>Subject1</option>
                            <option>Subject2</option>
                            <option>Subject3</option>
                            <option>Subject4</option>
                            <option>Subject5</option>
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
                    <label class="control-label col-sm-2" for="marks2">Marks5</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="marks5" name="marks5"placeholder="Enter Marks5">
                    </div>


                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>


            </form> 
        </div>
    </body>
</html>