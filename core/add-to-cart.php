<?php

	error_reporting(E_ALL);
	
	
	$id = $_POST['z1'];
	$ilosc = $_POST['z2'];
	
	session_start();
	require_once ('../database/db-connect.php');

	$z3 = $db_PDO->prepare('SELECT * FROM `koszyk` WHERE `id_user`=:id_klienta AND `id_produktu` = :id_produktu2');
	$z3->execute(['id_klienta' => $_SESSION['id'], 'id_produktu2' => $id]);
	$i3 = $z3->rowCount();
	
	$z2 = $db_PDO->prepare('SELECT * FROM `produkty` WHERE `id`="'.$id.'"');
	$z2->execute();
	
	if($i3 === 0){
		$z1 = $db_PDO->prepare('INSERT INTO `koszyk`(`id_user`, 
													`id_produktu`, 
													`ilosc`)
														VALUES(
															:id_user,
															:id_produktu,
															:ilosc
														)');
		$z1->execute([ 'id_user' => $_SESSION['id'], 'id_produktu' => $id, 'ilosc' => $ilosc ]);
	}else{
		$w3 = $z3->fetch();
		
		$iloscF = $w3['ilosc'] + $ilosc;
		echo 'ID: '.$id;
		echo '<br>';
		echo 'I3 ILOSC'.$i3;
		echo '<br>';
		echo 'W3 ILOSC'.$w3['ilosc'];
		echo '<br>';
		echo 'ILOSC F: '.$iloscF;
		$z1 = $db_PDO->prepare('UPDATE
										`koszyk`
									SET
										`ilosc` = :ile
									WHERE
										`id_produktu` = :id_produktu AND `id_user` = :id_user');
		$z1->execute([ ':ile' => $iloscF, ':id_produktu' => $id, ':id_user' => $_SESSION['id']]);
	}
	

	

?>