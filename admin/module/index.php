<?php 
    include '../shared/header.php';
    include '../connection.php'; 
?>
<div class="page-header">
    <h1>Modules</h1>
</div>
<a href="add.php" class="btn btn-primary glyphicon glyphicon-plus pull-right"></a>
<table class="table">
    <thead>
        <tr>
            <th>Code</th>
            <th>Module Title</th>
            <th>Credit</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $query = $conn->prepare('SELECT * FROM modules WHERE is_deleted=false ORDER BY id ASC');
            $query->execute();

            foreach ($query as $row) {

                echo '<td>' . $row['code'] . '</td>' .
                '<td>' . $row['title'] . '</td>' .
                '<td>' . $row['credits'] . '</td>' .
                '<td>' . $row['status'] . '</td>' ;
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