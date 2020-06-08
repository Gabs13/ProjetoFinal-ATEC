<?php
		$servername="34.89.101.164";
		$username="root";
		$password="nunosilva";

		//Criar Ligação

		$conn = mysqli_connect($servername, $username, $password);

		//Verificar Ligação
		if(!$conn)
		{
			die("Erro de Ligação: ".mysqli_connect_error());
		}
		else {
		}

		mysqli_select_db($conn,"Projeto");
		mysqli_set_charset($conn,"utf8");

?>
