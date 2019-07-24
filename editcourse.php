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
    <h1>Edit Course</h1>
</div>
<?php
$id = 0;
$name = '';
$courseid = '';
$subjectid = '';

if (isset($_GET['editcourse'])) {
    $id = $_GET['editcourse'];
    $subjectid=$_GET['subject'];

    $stmt = $conn->prepare("SELECT * FROM course WHERE Courseid=$id");
    $stmt->execute();
    $row = $stmt->fetch();
    $courseid = $row['Courseid'];
    $name = $row['name'];

}
?>
<form class="form-horizontal col-md-10" action=""
      method="post" name="studentdetails">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group">
        <label class="control-label col-sm-2" for="coursename">Course Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="coursename" name="coursename" value="<?php echo $name; ?>"
                   placeholder="Enter Course Name" ondrop="return false;" onpaste="return false;">        
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="updatecourse">Update Course</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="coursename">Course Name</label>
        <div class="col-sm-10"> 
            <select class="form-control" id="coursenamelist" name="coursenamelist">
                <?php
                $result = $conn->query('SELECT * FROM course WHERE isdeleted=0');

                while ($row = $result->fetch()) {
                    unset($id, $name);
                    $cid = $row['Courseid'];
                    $name = $row['name'];
                    ?>
                    <option value="<?php echo $cid; ?>"<?php if ($courseid == $cid) { ?> selected <?php } ?>><?php echo $name; ?></option>
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

                    <option value="<?php echo $sid; ?>"<?php if ($subjectid == $sid) { ?> selected <?php } ?>><?php echo $name; ?></option>
                    <?php
                }
                ?>
            </select>    
        </div>
    </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-info" name="assigncourseupdate">Assign Course</button>
            <button type="submit" class="btn btn-info" name="save&continuecourseassignupdate">Save and Continue</button>
            <a href="index.php" name="cancel"><span class="btn btn-danger">Cancel</span></a>
        </div>
    </div>
</form>
<?php
if (isset($_POST['updatecourse'])) {
    $sql = "UPDATE course SET name=:coursename WHERE Courseid=$courseid";
    $stmt = $conn->prepare($sql);
    $criteria = [
        'coursename' => $_POST['coursename']
    ];
    $stmt->execute($criteria);
    die();
    //header("location:index.php");
}
if (isset($_POST['assigncourseupdate'])) {

    $sql = "UPDATE course_subject SET courseid=:coursenamelist,subjectid=:subject WHERE courseid=:coursenamelist";
    $stmt = $conn->prepare($sql);
    $criteria = [
        'coursenamelist' => $_POST['coursenamelist'],
        'subject' => $_POST['subject']
    ];
    $stmt->execute($criteria);
    //header("location:index.php");
    //die();
}
if (isset($_POST['save&continuecourseassignupdate'])) {
    $sql = "UPDATE course_subject courseid=:coursenamelist,subjectid=:subject WHERE courseid=:coursenamelist";
    $stmt = $conn->prepare($sql);
    $criteria = [
        'coursenamelist' => $_POST['coursenamelist'],
        'subject' => $_POST['subject']
    ];
    $stmt->execute($criteria);
    die();
    header("location:editcourse.php");
}
?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Course Name</th>
            <th>Subject</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $course_subjectQuery = $conn->prepare('SELECT * FROM course_subject');
            $course_subjectQuery->execute();


            foreach ($course_subjectQuery as $row) {
                $courseid = $row['courseid'];
                $courseQuery = $conn->prepare("SELECT * FROM course WHERE Courseid='$courseid'");
                $courseQuery->execute();
                $course = $courseQuery->fetch();

                $subjectid = $row['subjectid'];
                $subjectQuery = $conn->prepare("SELECT * FROM subjects WHERE id='$subjectid'");
                $subjectQuery->execute();

                $subject = $subjectQuery->fetch();
                //echo $course['name'];
//            $courseQuery = $conn->prepare('SELECT name FROM faculties');
//            $subjectQuery = $conn->prepare('SELECT name FROM subjects WHERE id = :subjectid');
//            $courseQuery->execute();
//
//            while ($course = $courseQuery->fetch()) {
//                $subjectCriteria = [
//                    'id' => $course['id']
//                ];
//                $subjectQuery->execute($subjectCriteria);
//                $subject = $subjectQuery->fetch();


                echo '<td>' . $course['name'] . '</td>' .
                '<td>' . $subject['name'] . '</td>';
                ?>
                <td>
                    <a href="editcourse.php?editcourse=<?php echo $course['Courseid']; ?>&subject=<?php echo $subject['id']; ?>&id=<?php echo $row['id']; ?>" class="btn btn-success btn-xs" title="Edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="deletecourse.php?deletecourse=<?php echo $course['Courseid'] ?>&subject=<?php echo $subject['id']; ?>&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-xs" title="Delete"
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
