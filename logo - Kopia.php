	<script type="text/javascript" src="<?php echo URL;?>js/jquery-confirm/jquery-confirm.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>js/jquery-confirm/jquery-confirm.min.css">
<!--------------------------- MSG POPUP ------------------------------------->
	<script type="text/javascript" src="<?php echo URL;?>js/jquery-MSGpopup/jquery-msgpopup.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>js/jquery-MSGpopup/jquery-msgpopup.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	// <script type="text/javascript" src="<?php echo URL;?>js/jquery.min.js"></script>
	
		<script type="text/javascript" src="<?php echo URL;?>js/jquery-confirm/jquery-confirm.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo URL;?>js/jquery-confirm/jquery-confirm.min.css">

<script type="text/javascript" src="<?php echo URL;?>js/jquery.min.js"></script>

<div class="logo-out">
	<div class="logo">
		 
		<div class="logo-w1">
			<a id="baseindex" href="<?php echo URL;?>index.php">
				<img id="BHH" src="<?php echo URL;?>/img/logo/logo.png">
			</a>
		</div>
		<div class="alerts"></div>
		<div class="logo-w2">
			<!-- SKYNET.BETA -->
			
			<?php
		if(isset($_SESSION['zalogowany'])){
			if($_SESSION['ready'] === "ready" && $_SESSION['zalogowany'] === TRUE){
				echo '<div class="table_center">
					  <div class="drop-down">
						<div id="dropDown" class="drop-down__button">
	<span class="drop-down__name">' . $_SESSION['imie'] . ' ' . $_SESSION['nazwisko'] . '</span>
						</div>
						<div class="drop-down__menu-box">
						  <ul class="drop-down__menu">
							
							<li data-name="dashboard" class="drop-down__item">
								<a href="#" id="profil">PROFIL</a></li>
							';

			}
							
							echo '<li data-name="activity" class="drop-down__item">
								<a href="#" id="lg-out">
									<button class="custom-btn btn-8">
										<span>LOGOUT</span>
									</button>
								</a></li>
						  </ul>
						</div>
					  </div>
					</div>
					
					<button id="add-cart">
						<img id="ccc" src="'.URL.'/img/logo/cart.png">
					</button>';		
		}else{
				echo '<a href="logowanie/logowanie.php" id="profil">
					<img id="ccc" src="img/login-2.png">
				</a>';
			}
			
		?>
			
		</div>
		
		<div id="koszyk">
			<div class="koszyk-name">Karolina<br>Malinowicka 6,41-512</div>
			<div class="koszyk-info">
				<div class="koszyk-dane-operatora">AI-Inteligence</div>
				<div class="koszyk-data"><?php echo date('Y-m-d G:i:s');?></div>
			</div>
			<div class="OPT">PARAGON FISKALNY</div>
			<div id="paragon"></div>
		</div>
		
	</div>
</div>


