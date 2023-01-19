<div class="ssc">

<?php 

	include ('../session.php');

	if(isset($_SESSION['zalogowany'])){
			
			
			require_once ('../database/db-connect.php');

			$z = $db_PDO->prepare('SELECT * FROM `produkty`');
			$z->execute();
			$ii = $z->rowCount();
			for ($i=0; $i < $ii; $i++){
				
				$w = $z->fetch();
				echo '<div class="produkt">
				<div class="imgg">
					<img class="inpp" src="img/produkty/'.$w['nazwa_zdjecia'].'.png">
				</div>
				<div class="w100">
				<div class="w100-name">
					<div class="name">'.$w['nazwa'].'</div>
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
		}else{
			
			require_once ('../database/db-connect.php');

			$z = $db_PDO->prepare('SELECT * FROM `produkty`');
			$z->execute();
			$ii = $z->rowCount();
			for ($i=0; $i < $ii; $i++){
				
				$w = $z->fetch();
				echo '<div class="produkt">
				<div class="imgg">
					<img class="inpp" src="img/produkty/'.$w['nazwa_zdjecia'].'.png">
				</div>
				<div class="w100">
				<div class="w100-name">
					<div class="name">'.$w['nazwa'].'</div>
				</div>
				<div class="w100-cena">
					<div class="cena-nazwa"><b>CENA:&nbsp;</b></div>
					<div class="cena" data-cena="'.$w['cena'].'" id="C'.$w['id'].'">'.$w['cena'].' PLN</div>
				</div>
				
				</div>
				</div>';
			}
			
		}
	
		
		
		?>
</div>

<script>
sessionStorage.setItem("ale", "Tak by to było");
let data = sessionStorage.getItem("ale");
console.log(data);


$('.minus, .plus').click(function (e) {
    e.preventDefault();    
    var $input = $(this).siblings('.value');
    var val = parseInt($input.val(), 10);
    $input.val(val + ($(this).hasClass('minus') ? -1 : 1));
});

$('.add-cart-button').click(function() {
	var id = $(this).val();
	var ilosc = $("#S"+id).val();
	var name = $(this).attr("data-name");
	
	// var cena = $("#C"+id).text();
	// var cenaW = $("#C"+id).attr("data-cena");
	// var suma = ilosc * cenaW;
	// var SumaEnd = suma.toFixed(2); 
	// addAlerts(name, ilosc);
	// console.log("ID: "+id);
	// console.log("ILOŚĆ: "+ilosc);
	// console.log("CENA: "+cena);
	// console.log("NAZWA: "+name);
	// console.log("SUMA: "+SumaEnd);
	
	$.ajax({
		type: "POST",
		url: "core/add-to-cart.php",
		data: {"z1":id, "z2":ilosc},
		dataType:'text',
		beforeSend: function() {
			$('#loader').show();
		},
		success: function(msg){
			$('#loader').hide();
			$("#paragon").text(msg);
		},
	});	

			
});

function addAlerts(name, ilosc) {
	if(ilosc == 0){
		$('.alerts').text('Dodaj ilość jaką chcesz zakupić, 0 to nie ilość');
	}else{
		var message = name +" ( "+ilosc+" ) Produkt został dodany do koszyka";
		$('.alerts').text(message);
	}
	
}


</script>
		