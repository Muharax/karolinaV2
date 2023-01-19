<?php
	error_reporting(E_ALL);
session_start();

	if(!isset($_SESSION['zalogowany'])){
		echo 'BRAK DOSTĘPU';
		exit;
	}
	
	require ('../database/db-connect.php');

	$z1 = $db_PDO->prepare('SELECT * FROM `koszyk` WHERE `id_user`=:id');
	$z1->execute(['id' => $_SESSION['id']]);
	$i1 = $z1->rowCount();
	
	if($i1 > 0){
		for($i=0; $i < $i1; $i++){
			$w1 = $z1->fetch();
			
			$z2 = $db_PDO->prepare('SELECT * FROM `produkty` WHERE `id`=:id_prod');
			$z2->execute([':id_prod' => $w1['id_produktu']]);
			$i2 = $z2->rowCount();
					for($ii=0; $ii < $i2; $ii++){
						$w2 = $z2->fetch();
						
						echo '<div class="paragon-roz">
								<div>'.$w2['nazwa'].' - '.$w1['ilosc'].'*'.$w2['cena'].'</div>
								
								<div>'.$w1['ilosc'] * $w2['cena'].' PLN</div>
								
							</div>';
					
					}
				

		}
	}else{
		echo 'BRAK PRODUKTÓW W KOSZYKU';
		exit;
	}

?>