<?php 
include '../shared/header.php';
?>
<div class="page-header">
    <h1>Faculties</h1>
</div>
<a href="addform.php" class="btn btn-primary glyphicon glyphicon-plus pull-right"></a>
<table class="table">
    <thead>
        <tr>
            <th>Faculty Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            include '../connection.php';
            $facultyQuery = $conn->prepare('SELECT * FROM faculties WHERE is_deleted=false');
            $facultyQuery->execute();


            foreach ($facultyQuery as $row) {
                echo '<td>' . $row['name'] . '</td>';
                ?>
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