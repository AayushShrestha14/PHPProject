<?php
include "header.php";
include "connection.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="page-header">
    <h1>Add Faculty</h1>
</div>
<form class="form-horizontal col-md-10" action=""
      method="post" name="studentdetails">
    
    <div class="form-group">
        <label class="control-label col-sm-2" for="facultyname">Faculty Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="facultyname" name="facultyname" 
                   placeholder="Enter Faculty Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>

    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="addfaculty">Add Faculty</button>
            <button type="submit" class="btn btn-info" name="save&continuefac">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="facultyname">Faculty Name</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="facultynamelist" name="facultynamelist">
                <?php
                $result = $conn->query('SELECT * FROM faculties WHERE isdeleted=0');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $fid = $row['id'];
                    $name = $row['name'];

                    echo '<option value="' . $fid . '">' . $name . '</option>';
                }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="subject">Subject</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="subject" name="subject">
                <?php
                $result = $conn->query('SELECT * FROM subjects WHERE isdeleted=0');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $sid = $row['id'];
                    $name = $row['name'];

                    echo '<option value="' . $sid . '">' . $name . '</option>';
                }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="assignfaculty">Assign Faculty</button>
            <button type="submit" class="btn btn-info" name="save&continuefacassign">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
    <?php
    if (isset($_POST['addfaculty'])) {
        
        $sql = "INSERT INTO faculties (name) VALUES (:facultyname)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'facultyname' => $_POST['facultyname']
        ];
        $stmt->execute($criteria);
        
    }
    if (isset($_POST['save&continuefac'])) {
        
        $sql = "INSERT INTO faculties (name) VALUES (:facultyname)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'facultyname' => $_POST['facultyname']
        ];
        $stmt->execute($criteria);
        
    }
    if (isset($_POST['assignfaculty'])) {
        $sql='SELECT * FROM faculties';
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        
        $sql2='SELECT * FROM subjects';
        $stmt2=$conn->prepare($sql2);
        $stmt2->execute();
        foreach($stmt as $row){
            echo $_POST['facultynamelist'];
           echo $row['id'];
           while($row2=$stmt2->fetch()){
            echo $_POST['subject'];
            echo $row2['id'];
        if(($_POST['facultynamelist']==$row['id']) && $_POST['subject']==$row2['id']){
            echo "Record already exists";
            break;
            $conn=null;
            
        }else{
            echo "record added";
           break;
           $conn=null;
           
        }
           } }
//        $sql = "INSERT INTO faculty_subject (facultyid,subjectid) VALUES (:facultynamelist,:subject)";
//        $stmt = $conn->prepare($sql);
//        $criteria = [
//            'facultynamelist' => $_POST['facultynamelist'],
//            'subject' => $_POST['subject']
//        ];
//        $stmt->execute($criteria);
//        die();
//        header("location:index.php");
   
    }
    if (isset($_POST['save&continuefacassign'])) {
        $sql = "INSERT INTO faculty_subject (facultyid,subjectid) VALUES (:facultynamelist,:subject)";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'facultynamelist' => $_POST['facultynamelist'],
            'subject' => $_POST['subject']
        ];
        $stmt->execute($criteria);
        die();
        //header("location:index.php");
    }
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Faculty Name</th>
                <th>Subject</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $faculty_subjectQuery = $conn->prepare('SELECT * FROM faculty_subject WHERE isdeleted=0');
                $faculty_subjectQuery->execute();


                foreach ($faculty_subjectQuery as $row) {
                    $facultyid = $row['facultyid'];
                    $facultyQuery = $conn->prepare("SELECT * FROM faculties WHERE id=$facultyid");
                    $facultyQuery->execute();
                    $faculty = $facultyQuery->fetch();

                    $subjectid = $row['subjectid'];
                    $subjectQuery = $conn->prepare("SELECT * FROM subjects WHERE id=$subjectid");
                    $subjectQuery->execute();

                    $subject = $subjectQuery->fetch();
                    //echo $faculty['name'];
//            $facultyQuery = $conn->prepare('SELECT name FROM faculties');
//            $subjectQuery = $conn->prepare('SELECT name FROM subjects WHERE id = :subjectid');
//            $facultyQuery->execute();
//
//            while ($faculty = $facultyQuery->fetch()) {
//                $subjectCriteria = [
//                    'id' => $faculty['id']
//                ];
//                $subjectQuery->execute($subjectCriteria);
//                $subject = $subjectQuery->fetch();


                    echo '<td>' . $faculty['name'] . '</td>' .
                    '<td>' . $subject['name'] . '</td>';
                    ?>
                    <td>
                        <a href="editfaculty.php?editfaculty=<?php echo $faculty['id']; ?>&subject=<?php echo $subject['id']; ?>" class="btn btn-success btn-xs" title="Edit">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="deletefaculty.php?deletefaculty=<?php echo $faculty['id'] ?>&subject=<?php echo $subject['id']; ?>" class="btn btn-danger btn-xs" title="Delete"
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

    <?php
    include "footer.php";
    ?>
