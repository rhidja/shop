<?php
	include_once("connex.php");
	
    $idBrandDialog=trim($_POST['idBrandDialog']);
	
    $query_cmd = "INSERT INTO marque(nomMarque) VALUES('".$idBrandDialog."')";
    $bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
?>