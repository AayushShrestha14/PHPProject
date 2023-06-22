<?php 
include '../shared/header.php';
include '../connection.php';
?>
<div class="page-header">
    <h1>Courses</h1>
</div>
<a href="add.php" class="btn btn-primary glyphicon glyphicon-plus pull-right"></a>
<table class="table">
    <thead>
        <tr>
            <th>Course Name</th>
            <th>Department</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $courseQuery = $conn->prepare('SELECT * FROM courses WHERE is_deleted=false');
            $courseQuery->execute();


            foreach ($courseQuery as $row) {
                echo '<td>' . $row['name'] . '</td>';
                ?>
                <td>
                <?php
                $deptQuery = $conn->prepare('SELECT * FROM dept WHERE id = :id');
                $deptQuery->execute(['id' => $row['dept_id']]);
                $dept = $deptQuery->fetch();
                echo $dept['name'];
                ?>
                </td>
                <td>
                    <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-success" title="Edit">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a href="delete.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger" title="Delete"
                       onclick="return confirm('Are you sure to Delete ?');">
                        <span class="glyphicon glyphicon-trash"></span></a>
                </td>
                
            </tr>
            <?php
                }
            ?>      
    </tbody>
</table>

<?php include '../shared/footer.php'; ?>