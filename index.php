<?php
	error_reporting(E_ALL);

	defined('URL') or define('URL', 'http://'.$_SERVER['SERVER_NAME']. "/karolina/");
	
	include ('header.php');
	include ('session.php');
	include ('logo.php');
	include ('functions.php');
	
	
?>
<div id="main">
<div id="main_menu">
	<div class="menu">
		<?php getCategory();?>
	</div>

</div>


</div>



<?php 
	include('footer.php');
?>