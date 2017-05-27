<?php

	$host='localhost';		// Nazwa hosta
	$user='root'; 				// Nazwa użytkownika - domyślnie: root
	$password=''; 			// Haslo do bazy
	$database='milionerzy';	 	// Nazwa bazy
	$table='pytania'; 			// Nazwa tabeli

	

		$connection = mysqli_connect($host, $user, $password, $database);	
 
/*Komunikat o błędzie w przypadku problemów z połączeniem*/
if (mysqli_connect_errno()) 
{
   /* echo 'Błąd';*/
    exit;   
}
else {
	/*echo "Udane polaczenie";*/
}
?>