<div class="ssc">

<?php 

	include ('../session.php');
			
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
		
	
		
		
		?>
</div>

<script>



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
	var cena = $("#C"+id).attr("data-cena");
	
	// var cena = $("#C"+id).text();
	// var cenaW = $("#C"+id).attr("data-cena");
	// var suma = ilosc * cenaW;
	// var SumaEnd = suma.toFixed(2); 
	// addAlerts(name, ilosc);
	// console.log("ID: "+id);
	// console.log("ILOŚĆ: "+ilosc);
	// console.log("NAZWA: "+name);
	// console.log("CENA: "+cena);
	
	// console.log("CENA: "+cena);
	// console.log("SUMA: "+SumaEnd);


	var product = {};
	var koszyk = [];
	
	var product = {
		Id: id,
		Ilosc: ilosc,
		Name: name,
		Cena: cena
	};
	
	if(sessionStorage.koszyk){
		koszyk = JSON.parse(sessionStorage.getItem('koszyk'));
    }else{
		koszyk=[];
    }
	
	koszyk.push(product)
    sessionStorage.setItem('koszyk', JSON.stringify(koszyk));
	
	var Object = sessionStorage.getItem('koszyk');
	var OBJ = JSON.parse(Object);
    console.log('Object: ', OBJ);
	
	for (i = 0; i < OBJ.length; i++) {
		// console.log(JSON.stringify(OBJ[i]));
		
		
		var EL = JSON.stringify(OBJ[i])
		var NOO = EL.replace(/[^a-zA-Z0-9 ]/g, '');
		$('#paragon').append(NOO);
	}
	
	$('#paragon').append(JSON.stringify(OBJ[i]));
	$(".value").val('0');
	
	 // data.messages.forEach((OBJ, i) => {
		// console.log("msgFrom", OBJ.msgFrom);
		// console.log("msgBody", OBJ.msgBody);
	// });
 
	// for (var key in data.messages) {
    // var obj = data.messages[key];
// }

	
	
	// for (i = 0; i < OBJ.length; i++) {
		// $('#paragon').append(OBJ[i]);
		// console.log(OBJ[i]);
	// }

	
	
	// var PProdukty = JSON.stringify(product);
	// sessionStorage.setItem('koszyk', PProdukty);
	
	// var koszyk = sessionStorage.getItem('koszyk');
	// var koszykObj = JSON.parse(koszyk);
	
	// console.log(koszykObj);
	
	// console.log('PRODUKT: '+product);
	// console.log('PRODUKT: '+JSON.stringify(product));
	
	
	// koszyk = JSON.parse(sessionStorage.getItem('koszyk'));
	// console.log('KOSZYK: '+koszyk);
	// NowyKoszyk = JSON.stringify(koszyk);
	// sessionStorage.setItem('koszyk', NowyKoszyk);
	
	// var PProdukty = JSON.stringify(product);
	// console.log('P1: '+PProdukty);
	// koszyk = JSON.parse(sessionStorage.getItem('koszyk'));
    // NowyKoszyk = JSON.stringify(koszyk);
    // sessionStorage.setItem('koszyk', NowyKoszyk);










	// products.push();
	
	// sessionStorage.getItem('koszyk');
	// var koszyk = JSON.parse(sessionStorage.getItem('koszyk'));
	// console.log('KOSZYK: '+koszyk);
	// produkty = koszyk.length;
	 // for (var i = 0; i < produkty; i++){
		 // var x = JSON.parse(koszyk[i]);
		// console.log('LOG: '+x);
	 // }
	
	
	// var produkty = JSON.stringify(+id+'/'+ilosc+'/'+name+'/'+cena);
	// sessionStorage.setItem("koszyk", produkty);
	// let data = sessionStorage.getItem("koszyk");
	// ob = data.split('/');
	// console.log(ob);
	
	
	// function DodajDoKoszyka(){
		
	// }


// let data = sessionStorage.getItem("ale");
// console.log(data);


			
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
		