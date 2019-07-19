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
    <h1>Edit Faculty</h1>
</div>
<?php
$id = 0;
$name = '';
$facultyid='';
$subjectid='';

if (isset($_GET['editfaculty'])) {
    $id = $_GET['editfaculty'];
    //$subjectid=$_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM faculties WHERE id=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $facultyid = $row['id'];
    $name = $row['name'];

    $stmt2 = $conn->prepare("SELECT subjectid FROM faculty_subject WHERE facultyid=$facultyid ");
    $stmt2->execute();
    $row2 = $stmt->fetch();
    $subjectid = $row2['subjectid'];

//    //$subjectid=$subject['id'];
//    $stmt3 = $conn->prepare("SELECT * FROM subjects WHERE id=$subjectid");
//    $stmt3->execute();
//    $row3 = $stmt3->fetch();
//    $subjectid = $row3['id'];
//    $subjectname = $row3['name'];
}
?>

<form class="form-horizontal col-md-10" action=""
      method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group">
        <label class="control-label col-sm-2" for="facultyname">Faculty Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="facultyname" name="facultyname" value="<?php echo $name; ?>"
                   placeholder="Enter Faculty Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="updatefaculty">Update Faculty</button>
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
                    
                    ?>

                    <option value="<?php echo $fid; ?>"<?php if ($facultyid == $fid) { ?> selected <?php } ?>><?php echo $name; ?></option>
                <?php }
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
                    ?>

                    <option value="<?php echo $sid; ?>"<?php if ($subjectid == $sid) { ?> selected <?php } ?>><?php echo $name ?></option>
                <?php }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="assignfacultyupdate">Assign Faculty</button>
            <button type="submit" class="btn btn-info" name="save&continuefacassign">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <?php
    if (isset($_POST['updatefaculty'])) {
        $sql = "UPDATE faculties SET name=:facultyname WHERE id=:facultyid";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'facultyname' => $_POST['facultyname']
        ];
        $stmt->execute($criteria);
        die();
        header("location:index.php");
    }
    if (isset($_POST['assignfacultyupdate'])) {

        $sql = "UPDATE faculty_subject SET facultyid=:facultynamelist,subjectid=:subject WHERE id=:facultynamelist";
        $stmt = $conn->prepare($sql);
        $criteria = [
            'facultynamelist' => $_POST['facultynamelist'],
            'subject' => $_POST['subject']
        ];
        $stmt->execute($criteria);
        die();
        header("location:index.php");
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
                    $facultyQuery = $conn->prepare("SELECT * FROM faculties WHERE id='$facultyid'");
                    $facultyQuery->execute();
                    $faculty = $facultyQuery->fetch();

                    $subjectid = $row['subjectid'];
                    $subjectQuery = $conn->prepare("SELECT * FROM subjects WHERE id='$subjectid'");
                    $subjectQuery->execute();

                    $subject = $subjectQuery->fetch();

                    echo '<td>' . $faculty['name'] . '</td>' .
                    '<td>' . $subject['name'] . '</td>';
                    ?>
                    <td>
                        <a href="editfaculty.php?editfaculty=<?php echo $faculty['id']; ?>&subject=<?php echo $subject['id']; ?>" class="btn btn-success btn-xs" title="Edit">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                        <a href="deletefaculty.php?delete=<?php echo $faculty['id'] ?>&subject=<?php echo $subject['id']; ?>" class="btn btn-danger btn-xs" title="Delete"
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
