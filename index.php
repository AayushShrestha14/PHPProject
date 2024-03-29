<?php 
session_start();
include 'shared/header.php';
include 'admin/connection.php';
?>

<a href="login.php">Go to Login Page</a>

<a href="add.php" class="btn btn-primary glyphicon glyphicon-plus pull-right"></a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Firstname</th>
            <th scope="col">Surname</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Email</th>
            <th scope="col">Term</th>
            <th scope="col">Computer Communication</th>
            <th scope="col">Computer System</th>
            <th scope="col">Web Development</th>                      
            <th scope="col">Software Engineering 1</th>
            <th scope="col">Problem Solving and Programming</th>
            <th scope="col">Database-1</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $examQuery = $conn->prepare('SELECT * from examdata WHERE is_deleted=0');
            $personalQuery = $conn->prepare('SELECT * FROM personaldata WHERE id = :id');
            $examQuery->execute();

            while ($exam = $examQuery->fetch()) {
                $personalCriteria = [
                    'id' => $exam['p_id']
                ];
                $personalQuery->execute($personalCriteria);
                $personal = $personalQuery->fetch();
            
            echo '<td scope="row">' . $personal['first_name'] . '</td>' .
            '<td>' . $personal['surname'] . '</td>' .
            '<td>' . $personal['dob'] . '</td>' .
            '<td>' . $personal['email'] . '</td>' .
            '<td>' . $exam['term'] . '</td>' .
            '<td>' . $exam['cc'] . '</td>' .
            '<td>' . $exam['cs'] . '</td>' .
            '<td>' . $exam['web_1'] . '</td>' .
            '<td>' . $exam['se_1'] . '</td>' .
            '<td>' . $exam['ps'] . '</td>' .
            '<td>' . $exam['db_1'] . '</td>';          
            ?>
            <td>
                <a href="edit.php?edit=<?php echo $personal['id']; ?>&term=<?php echo $exam['term']; ?>" class="btn btn-success btn-xs" title="Edit">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
                <a href="delete.php?delete=<?php echo $personal['id'] ?>&term=<?php echo $exam['term'];?>" class="btn btn-danger btn-xs" title="Delete"
                   onclick="return confirm('Are you sure to Delete ?');">
                    <span class="glyphicon glyphicon-trash"></span></a>
            </td>
            </tr>
            <?php
            }?>      
    </tbody>
</table>
<?php 
include 'shared/footer.php';
?>