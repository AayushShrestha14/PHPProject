<?php 
    include '../shared/header.php';
    include '../connection.php'; 
?>
<div class="page-header">
    <h1>Users</h1>
</div>
<a href="add.php" class="btn btn-primary glyphicon glyphicon-plus pull-right"></a>
<table class="table">
    <thead>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $query = $conn->prepare('SELECT * FROM users WHERE is_deleted=false ORDER BY id ASC');
            $query->execute();              

            foreach ($query as $row) {               
                //get value of title column from modules table where code column is foreign key for all records of module_details
                $roleId = $row['role_id'];
                $query1 = $conn->prepare('SELECT name FROM roles WHERE id=:roleId');
                $query1->bindParam(':roleId', $roleId);
                $query1->execute();
                $role = $query1->fetchColumn();

                echo '<td>' . $row['username'] . '</td>' .
                '<td>' . $row['email'] . '</td>' .
                '<td>' . $role . '</td>';
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