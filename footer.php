<div class="footer-out">
	
	<div class="footer-w2">
	
	</div>
	
</div>



</body>
</html>


<script>

$(document).on("click", '.ente', function() {
	var id = $(this).val();
	console.log(id);
	$.ajax({
		type: "POST",
		url: "iteams/all.php",
		data: {"z1":id},
		dataType:'text',
		success: function(msg){
			$("#main").html(msg);
			
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







$(document).on("click", '#admin', function() {
	$("#main").load(origin+'/karolina/administracja/home.php');
});



$(document).on("click", '.add-cart-button', function() {
	var id = $(this).val();
	var ilosc = $("#S"+id).val();
	var name = $("#N"+id).text();
	$("#S"+id).val('0');
	addAlerts(name, ilosc);
	console.log(id);
	console.log(ilosc);
	console.log(name);
	
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
					$("#paragon").load('core/koszyk-pobierz.php');
					// $("#paragon").html(msg);
				},
				complete: function(){
					// $('#loader').fadeOut(1000);
				},
			});	
	
});



$(document).on("click", '#profil', function() {
	$("#main").load(origin+'/karolina/user/profil.php');
});

$(document).on("click", '#add-cart', function() {
	$("#paragon").load('core/koszyk-pobierz.php');
	$("#koszyk").toggle('fast');
});

$(document).on("click", '.inp', function() {	
	var t1 = $(this).attr("data-id");

		$.ajax({
			type: "POST",
			url: "iteams/all.php",
			data: {"z1":t1},
			dataType:'text',
			success: function(msg){
				$("#main").html(msg);
				
			},
		});
	
});
// ========================== WYLOGOWANIE ========================== 
$(document).on("click", '#lg-out', function() {
$.confirm({
		title: 'WYLOGOWAĆ ?',
		content: 'CZY JESTEŚ TEGO PEWNY ?',
		escapeKey: 'cancelAction',
		buttons: {
			confirm: {
				btnClass: 'btn-red',
				text: 'WYLOGUJ',
				action: function(){
					$.ajax({
						type: "POST",
						url: origin+'/karolina/logout.php',
						dataType:'text',
						success: function(){
								window.location.href = origin+'/karolina/index.php'
						},
					})				
				}
			},
			cancelAction: {
				btnClass: 'btn-green',
				text: 'ANULUJ',
			}
		}
	});
});
// ========================== MENU ========================== 
$(document).ready(function(){
	 $('#dropDown').click(function(event){
		$('.drop-down').toggleClass('drop-down--active');
		event.stopPropagation();
	  });
	  $(document).click(function(event) {
			if (!$(event.target).hasClass('drop-down--active')) {
				$(".drop-down").removeClass("drop-down--active");
			}
		});
});



	var pathname = window.location.pathname; // Returns path only (/path/example.html)
	var url      = window.location.href;     // Returns full URL (https://example.com/path/example.html)
	var origin   = window.location.origin;   // Returns base URL (https://example.com)
	var URL		 = window.location.origin+'/karolina/';   // Returns base URL (https://example.com)
	
	
</script>
