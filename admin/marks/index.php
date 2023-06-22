<?php 
session_start();
include '../shared/header.php';
include '../connection.php';
?>

<?php 
    $personalQuery = $conn->prepare('SELECT * FROM personaldata WHERE id = 1'); 
    $personalQuery->execute();
    $personal = $personalQuery->fetch();

?>
<h3 class="text-center">Student Personal Details</h3>
<h4>Name: <?php echo $personal['first_name'] . ' ' . $personal['surname']; ?></h3>
<h4>Student ID: <?php echo $personal['id']; ?></h4>
<h4>Date of Birth: <?php echo $personal['dob']; ?></h4>
<h4>Email: <?php echo $personal['email']; ?></h4>
<h4>PAT: </h4>

<h3 class="text-center">Marks Sheet</h3>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Year</th>
            <th scope="col">Period</th>
            <th scope="col">Module</th>
            <th scope="col">Title</th>                      
            <th scope="col">Level</th>
            <th scope="col">Credit</th>
            <th scope="col">Mark</th>
            <th scope="col">Grade</th>
            <th scope="col">Attempts</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            $examQuery = $conn->prepare('SELECT * from examdata WHERE is_deleted=0');
            $examQuery->execute();

            while ($exam = $examQuery->fetch()) {
                $personalCriteria = [
                    'id' => $exam['p_id']
                ];
            
            echo
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY1017' . '</td>' .
            '<td>' . 'Computer Communications' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY1014' . '</td>' .
            '<td>' . 'Computer Systems' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>' .
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY1018' . '</td>' .
            '<td>' . 'Internet Technology' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY1019' . '</td>' .
            '<td>' . 'Software Engineering 1' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY1020' . '</td>' .
            '<td>' . 'Problem Solving and Programming' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY1026' . '</td>' .
            '<td>' . 'Database 1' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>' .
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY1017' . '</td>' .
            '<td>' . 'Computer Communications' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY1014' . '</td>' .
            '<td>' . 'Computer Systems' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>' .
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY1018' . '</td>' .
            '<td>' . 'Internet Technology' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY1019' . '</td>' .
            '<td>' . 'Software Engineering 1' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY1020' . '</td>' .
            '<td>' . 'Problem Solving and Programming' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2014/15' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY1026' . '</td>' .
            '<td>' . 'Database 1' . '</td>' .
            '<td>' . 'I' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>' .
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY2002' . '</td>' .
            '<td>' . 'Operating System' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY2026' . '</td>' .
            '<td>' . 'Modern Networks' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>' .
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY2027' . '</td>' .
            '<td>' . 'Group Project' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY2028' . '</td>' .
            '<td>' . 'Web Programming' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY2038' . '</td>' .
            '<td>' . 'Database 2' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY2030' . '</td>' .
            '<td>' . 'Systems Design and Development' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>' .
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY2002' . '</td>' .
            '<td>' . 'Operating System' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY2026' . '</td>' .
            '<td>' . 'Modern Networks' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>' .
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY2027' . '</td>' .
            '<td>' . 'Group Project' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY2028' . '</td>' .
            '<td>' . 'Web Programming' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY2038' . '</td>' .
            '<td>' . 'Database 2' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2015/16' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY2030' . '</td>' .
            '<td>' . 'Systems Design and Development' . '</td>' .
            '<td>' . 'II' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'  .
            '</tr><tr>' .
            '<td>' . '2016/17' . '</td>' .
            '<td>' . '' . '</td>' .
            '<td>' . '' . '</td>' .
            '<td>' . 'Learning through Work' . '</td>' .
            '<td>' . '' . '</td>' .
            '<td>' . '' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2017/18' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY3010' . '</td>' .
            '<td>' . 'Media Technology' . '</td>' .
            '<td>' . 'III' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>' .
            '</tr><tr>' .
            '<td>' . '2017/18' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY3023' . '</td>' .
            '<td>' . 'Cyber Security and Cryptography' . '</td>' .
            '<td>' . 'III' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2017/18' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY3024' . '</td>' .
            '<td>' . 'Database 3' . '</td>' .
            '<td>' . 'III' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2017/18' . '</td>' .
            '<td>' . 'SEM I' . '</td>' .
            '<td>' . 'CSY3025' . '</td>' .
            '<td>' . 'Artificial Intelligence Techniques' . '</td>' .
            '<td>' . 'III' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2017/18' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY4010' . '</td>' .
            '<td>' . 'Computer Dissertation' . '</td>' .
            '<td>' . 'III' . '</td>' .
            '<td>' . '40' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2017/18' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY3010' . '</td>' .
            '<td>' . 'Media Technology' . '</td>' .
            '<td>' . 'III' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>' .
            '</tr><tr>' .
            '<td>' . '2017/18' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY3023' . '</td>' .
            '<td>' . 'Cyber Security and Cryptography' . '</td>' .
            '<td>' . 'III' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2017/18' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY3024' . '</td>' .
            '<td>' . 'Database 3' . '</td>' .
            '<td>' . 'III' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'.
            '</tr><tr>' .
            '<td>' . '2017/18' . '</td>' .
            '<td>' . 'SEM II' . '</td>' .
            '<td>' . 'CSY3025' . '</td>' .
            '<td>' . 'Artificial Intelligence Techniques' . '</td>' .
            '<td>' . 'III' . '</td>' .
            '<td>' . '20' . '</td.>' .
            '<td>' . '100' . '</td>'.
            '<td>' . 'A+' . '</td>'.
            '<td>' . '1' . '</td>'
            ;

            /* '<td>' . $exam['term'] . '</td>' .
            '<td>' . $exam['period'] . '</td>' .
            '<td>' . $exam['code'] . '</td>' .
            '<td>' . $exam['title'] . '</td>' .
            '<td>' . $exam['level'] . '</td>' .
            '<td>' . $exam['credits'] . '</td.>' .
            '<td>' . $exam['marks'] . '</td>'.
            '<td>' . $exam['grade'] . '</td>'.
            '<td>' . $exam['attempts'] . '</td>';  */
            
            ?>
            </tr>
            <?php
            }?>      
    </tbody>
</table>
<?php 
include '../shared/footer.php';
?>