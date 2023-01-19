<?php
	error_reporting(E_ALL);

	session_start();
	
	if(!isset($_SESSION['zalogowany'])){
		echo 'Brak dostępu';
	}else{
		echo '<button>Sprawdź produkt</button><br>';
		echo '<button>Dodaj produkt</button><br>';
		echo '<button>Usuń produkt</button><br>';
		echo '<button>Spawdź promocje</button><br>';
		echo '<button>Dodaj promocje</button><br>';
		echo '<button>Usuń promocje</button><br>';
	}

?>