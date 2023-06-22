<?php
include "../shared/header.php";
include "../connection.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="page-header">
    <h1>Departments</h1>
</div>
<a href="add.php" class="btn btn-primary glyphicon glyphicon-plus pull-right"></a>
<table class="table">
        <thead>
            <tr>
                <th>Department Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
               
                    $query = $conn->prepare("SELECT * FROM dept WHERE is_deleted=false");
                    $query->execute();

                    foreach ($query as $row) {

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
                <?php }
                
                    ?>
                  
        </tbody>
    </table> 

<?php
include "../shared/footer.php";
?>
