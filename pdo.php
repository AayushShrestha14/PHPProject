<?php
	$server='127.0.0.1';
	$username='root';
	$password='password';
	$schema='phpproject';
        
        try{
        $pdo=new PDO('mysql:dbname='.$schema.';host='.$server,$username,$password);
        }
        catch (PDOException $e){
            echo $e->getMessage();
            exit();
        }
	//$results=$pdo->query('SELECT * FROM personaldata');
        
        
	
        

?>