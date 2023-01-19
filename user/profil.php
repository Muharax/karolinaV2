<?php 
	error_reporting(E_ALL);
session_start();

	if(!isset($_SESSION['zalogowany'])){
		echo 'BRAK DOSTĘPU';
		exit;
	}
	
	require_once ('../database/db-connect.php');

	$z = $db_PDO->prepare('SELECT * FROM `users` WHERE `id`="'.$_SESSION['id'].'"');
	$z->execute();
	$w = $z->fetch();
?>
<div class="profil-0">
	<div class="profil-1">
		<div class="profil-group">
			<div class="profil-opis">Imię: </div>
			<div class="profil-opis">Nazwisko: </div>
			<div class="profil-opis">Logowania: </div>
			<div class="profil-opis">Stan Konta: </div>
		</div>
		
		<div class="spaceLP4"></div>
		
		<div class="profil-group-dane">
			<div class="profil-w"><?php echo $w['imie'];?></div>
			<div class="profil-w"><?php echo $w['nazwisko'];?></div>
			<div class="profil-w"><?php echo $w['logowania'];?></div>
			<div class="profil-w"><?php echo $w['stanKonta'].' PLN';?></div>
		</div>

	</div>
	
	<div class="profil-options">
		<input type="button" value="Zmien hasło"></input>
	</div>
</div>