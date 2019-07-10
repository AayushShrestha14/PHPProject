<?php

include 'header.php';
?>

<form action='pdo.php' method='GET'>
	<label for='firstname'>First Name:</label><input type='text' id='firstname' name='firstname' /><br>
	<label for='surname'>Surname:</label><input type='text' id='surname' name='surname' /><br>
	
	<input type='submit' value='Submit' />
</form>

<?php

include 'footer.php';

?>