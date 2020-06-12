<?php 
//meter regex no id
    include 'conn-test.php';
    //informação da modal
    $id =$_POST['id'];
    
    $galeria = mysqli_query($connT, "SELECT * FROM `galeria` WHERE galeria_id=".$id);
    $gal = mysqli_fetch_array($galeria);
    echo json_encode($gal);

    
    //manda o id da galeria onlick para o php 
    //php vai buscar toda a informação do id na base de dados
    //criar função em js para criar as divs da galeria

?>