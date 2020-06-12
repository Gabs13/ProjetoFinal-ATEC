<?php
		
		$servername="127.0.0.1";
		$username="root";
		$password="";

		//Criar Ligação

		$connT = mysqli_connect($servername, $username, $password);


		
		//Verificar Ligação
		if(!$connT)
		{
			die("Erro de Ligação: ".mysqli_connect_error());
		}
		else
		{

		}

		mysqli_select_db($connT,"teste");
		mysqli_set_charset($connT,"utf8");

?>