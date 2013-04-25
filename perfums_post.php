<?php
	include_once("connex.php");
	
    //echo $idPerfum=trim($_POST['idPerfum']);
	$nomParfum=trim($_POST['nomParfumDialog']);
	
    $query_cmd = "INSERT INTO perfums (nomParfum) VALUES('".$nomParfum."')";
    $bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
?>