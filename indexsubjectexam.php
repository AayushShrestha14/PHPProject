<?php include 'header.php'; ?>

<a href="login.php">Go to Login Page</a>
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
<a href="addsubjectexam.php" class="btn btn-primary glyphicon glyphicon-plus pull-right"></a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Subject Name</th>
            <th>Exam</th>
            <th>Term</th>
            <th>Full Marks</th>
            <th>Pass Marks</th>
            <th>Practical Marks</th>
            <th>Viva Marks</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $exam_subjectQuery = $conn->prepare('SELECT * FROM exam_subject WHERE isdeleted=0');
            $exam_subjectQuery->execute();


            foreach ($exam_subjectQuery as $row) {
                $examid = $row['examid'];
                $examQuery = $conn->prepare("SELECT * FROM exam WHERE id='$examid'");
                $examQuery->execute();
                $exam = $examQuery->fetch();

                $subjectid = $row['subjectid'];
                $subjectQuery = $conn->prepare("SELECT * FROM subjects WHERE id='$subjectid'");
                $subjectQuery->execute();

                $subject = $subjectQuery->fetch();

                echo '<td>' . $subject['name'] . '</td>' .
                '<td>' . $exam['name'] . '</td>' .
                '<td>' . $row['term'] . '</td>' .
                '<td>' . $row['fullmarks'] . '</td>' .
                '<td>' . $row['passmarks'] . '</td>' .
                '<td>' . $row['practical'] . '</td>' .
                '<td>' . $row['viva'] . '</td>' .
                '<td>' . $row['remarks'] . '</td>';
                ?>
                <td>
                    <a href="editsubjectexam.php?editsubjectexam=<?php echo $row['id']; ?>&subject=<?php echo $subject['id']; ?>&exam=<?php echo $exam['id']; ?>&term=<?php echo $row['term']; ?>" class="btn btn-success btn-xs" title="Edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="deletesubjectexam.php?deletesubjectexam=<?php echo $row['id'] ?>&subject=<?php echo $subject['id']; ?>&exam=<?php echo $exam['id']; ?>&term=<?php echo $row['term']; ?>" class="btn btn-danger btn-xs" title="Delete"
                       onclick="return confirm('Are you sure to Delete ?');">
                        <span class="glyphicon glyphicon-trash"></span></a>
                </td>
            </tr>
            <?php
            //}
        }
        ?>      
    </tbody>
</table>

<?php include 'footer.php'; ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          