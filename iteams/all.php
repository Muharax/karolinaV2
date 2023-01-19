<?php defined('URL') or define('URL', 'http://'.$_SERVER['SERVER_NAME']. "/karolina/");?>
<div class="back">
	<div class="backA">
		<a href="<?php URL;?>index.php" class="backBTN">Menu Główne</a>
	</div>
	
	<?php include('../kategorie/kategorie-pasek.php');?>
</div>



<div class="ssc">

<?php 

	session_start();
	
	if(!isset($_SESSION['zalogowany'])){
			if(!isset($_POST['z1'])){
			echo 'X';
		}else{
			$kategoria = $_POST['z1'];
			require('../database/db-connect.php');
			$z = $db_PDO->prepare('SELECT * FROM `produkty` WHERE `id_kategorii`= :id');
			$z->execute([ ':id' => $kategoria ]);
			$ii = $z->rowCount();
			
			for($i=0; $ii > $i; $i++){
				$w = $z->fetch();
				echo '<div class="produkt">
						<div class="imgg">
							<img class="inpp" src="img/produkty/'.$w['nazwa_zdjecia'].'.jpg">
						</div>
						<div class="w100">
						<div class="w100-name">
							<div class="name" id="">'.$w['nazwa'].'</div>
						</div>
						<div class="w100-cena">
							<div class="cena-nazwa"><b>CENA:&nbsp;</b></div>
							<div class="cena" data-cena="" id="">'.$w['cena'].' PLN</div>
						</div>
						
						</div>
						</div>';
			}
		}
	}else{
		if(!isset($_POST['z1'])){
			echo 'X';
		}else{
			
			$kategoria = $_POST['z1'];
			require('../database/db-connect.php');
			$z = $db_PDO->prepare('SELECT * FROM `produkty` WHERE `id_kategorii`= :id');
			$z->execute([ ':id' => $kategoria ]);
			$ii = $z->rowCount();
			
			for($i=0; $ii > $i; $i++){
				$w = $z->fetch();
				echo '<div class="produkt">
						<div class="imgg">
							<img class="inpp" src="img/produkty/'.$w['nazwa_zdjecia'].'.jpg">
						</div>
						<div class="w100">
						<div class="w100-name">
							<div class="name" id="N'.$w['id'].'">'.$w['nazwa'].'</div>
						</div>
						<div class="w100-cena">
							<div class="cena-nazwa"><b>CENA:&nbsp;</b></div>
							<div class="cena" data-cena="'.$w['cena'].'" id="C'.$w['id'].'">'.$w['cena'].' PLN</div>
						</div>
						<div class="options">
							<input type="button" id="" class="plus" value="+"></input>
							<input type="number" id="S'.$w['id'].'" class="input-kategorie value" value="0" data-quantity="">
							<input type="button" id="" class="minus" value="-"></input>
						</div>
						<div class="add-cart">
							<button type="button" class="add-cart-button" value="'.$w['id'].'" data-name="'.$w['nazwa'].'">Dodaj do koszyka</button>
						</div>
						
						</div>
						</div>';
			}
		}
	
	}
	
	

?>
</div>

<script>
$('.minus, .plus').click(function (e) {
    e.preventDefault();    
    var $input = $(this).siblings('.value');
    var val = parseInt($input.val(), 10);
    $input.val(val + ($(this).hasClass('minus') ? -1 : 1));
});

</script>
		