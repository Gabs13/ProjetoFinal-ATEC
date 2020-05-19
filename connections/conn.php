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
			echo "Conetado com sucesso!";
		}

		mysqli_select_db($conn,"teste");
		mysqli_set_charset($conn,"utf8");

?>
