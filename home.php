<?php
	error_reporting(E_ALL);

	defined('URL') or define('URL', 'http://'.$_SERVER['SERVER_NAME']. "/karolina/");
	
	include ('header.php');
	include ('session.php');
	include ('logo.php');
	
?>
Witamy w naszym sklepie
<div id="main">
<div id="main_menu">
	<div class="menu">
		<div class="produkt" class="inp">
			<div class="imgg">
				<img src="img/pieczywo.png">
			</div>
			<div class="w100">
				<button class="pieczywo">Pieczywo</button>
			</div>
		</div>
		<div class="produkt">
			<div class="imgg">
				<img src="img/owoce.jpg">
			</div>
			<div class="w100">
				<button class="pieczywo">Owoce</button>
			</div>
		</div>
		<div class="produkt">
			<div class="imgg">
				<img src="img/ziola-przyprawy.jpg">
			</div>
			<div class="w100">
				<button class="pieczywo">Przyprawy</button>
			</div>
		</div>


	</div>

</div>


</div>



<?php 
include('footer.php');

?>