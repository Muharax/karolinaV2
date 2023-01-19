<?php
	session_start();
?>
<div class="orange"></div>
<div id="formularz-logowania">
	<form action="zaloguj.php" method="POST">
		<div id="logowanie-s">
			<div id="name">
			<i class="material-icons prefix cwhite">apps</i>
				<input type="text" id="first" autocomplete="off" autofocus="On" name="user" placeholder="Login" value="" required>
			</div>
					
			<div id="pass">
			<i class="material-icons prefix cwhite">lock</i>
				<input type="password" id="second" autocomplete="off" name="pass" placeholder="Hasło" value="" required>
			</div>
			
			<div id="btn-log-in">
				<button type="submit" class="log-in" id="sub">Sign In</button>
			</div>
		</div>
	</form>
</div>
	
<?php include('../footer.php');?>
