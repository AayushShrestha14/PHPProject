<?php 
    include '../shared/header.php';
    include '../connection.php'; 
?>
<div class="page-header">
    <h1>Module Details</h1>
</div>
<a href="add.php" class="btn btn-primary glyphicon glyphicon-plus pull-right"></a>
<table class="table">
    <thead>
        <tr>
            <th>Module Title</th>
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
            $query = $conn->prepare('SELECT * FROM module_details WHERE is_deleted=false ORDER BY id ASC');
            $query->execute();              

            foreach ($query as $row) {               
                //get value of title column from modules table where code column is foreign key for all records of module_details
                $code = $row['code'];
                $query1 = $conn->prepare('SELECT title FROM modules WHERE code=:code');
                $query1->bindParam(':code', $code);
                $query1->execute();
                $module_title = $query1->fetchColumn();
                $practicalMarks = ($row['practical_marks']) ? $row['practical_marks'] : 'N/A';
                $remarks = ($row['remarks']) ? $row['remarks'] : 'N/A';

                echo '<td>' . $module_title . '</td>' .
                '<td>' . $row['full_marks'] . '</td>' .
                '<td>' . $row['pass_marks'] . '</td>' .
                '<td>' . $practicalMarks . '</td>' .
                '<td>' . $row['viva_marks'] . '</td>' .
                '<td>' . $remarks . '</td>';
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