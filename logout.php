<?php        
	session_start();
        include 'header.php';
	unset($_SESSION['id']);
	echo 'You are logged out.';
        include 'footer.php';
?>