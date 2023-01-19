<?php 


function getCategory(){
		
	require ('database/db-connect.php');
	$z1 = $db_PDO->prepare('SELECT * FROM `kategorie`');
	$z1->execute();
	$i1 = $z1->rowCount();
	
	for($i=0;$i<$i1;$i++){
		$w1 = $z1->fetch();
		echo '<div class="produkt inp" data-id="'.$w1['nr'].'">
				<div class="imgg">
					<img src="img/kategorie/'.$w1['nazwa_zdjecia'].'.jpg">
				</div>
				<div class="w100">
					<button class="pieczywo">'.$w1['nazwa'].'</button>
				</div>
			</div>';
	}
}


function getPasekCategory(){
		
	require ('database/db-connect.php');
	$z1 = $db_PDO->prepare('SELECT * FROM `kategorie`');
	$z1->execute();
	$i1 = $z1->rowCount();
	
	for($i=0;$i<$i1;$i++){
		$w1 = $z1->fetch();
		echo '<div class="producto" data-id="'.$w1['nr'].'">
				<div class="">
					<button class="btn btn-warning ente" value="'.$w1['nr'].'">'.$w1['nazwa'].'</button>
				</div>
			</div>';
	}
}
	




?>