<?php

try
   {
      $db_PDO = new PDO('mysql:host=178.32.219.12;dbname=697734_9Kh874', '697734_9Kh874', '9P8PSSVBStlHjL', [
	  PDO::ATTR_EMULATE_PREPARES => false, 
	  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		
	]);
	  
   }
   catch(PDOException $e)
   {
      echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
   }
	
?>
