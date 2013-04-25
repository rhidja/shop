<?php
	include_once("connex.php");
	
    $idTypeDialog=trim($_POST['idTypeDialog']);
	
    $query_cmd = "INSERT INTO categorie(nomCategorie) VALUES('".$idTypeDialog."')";
    $bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
?>