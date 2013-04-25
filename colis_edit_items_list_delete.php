<?php
	//session_start();
	include_once("connex.php");
	
    $idColis=trim($_POST['idColis']);
	$nomProduit=trim($_POST['nomProduit']);
	$nomParfum=trim($_POST['nomParfum']);
	
	$query_cmd ="SELECT * FROM colisitemslist WHERE (idColis='".$idColis."') and (nomProduit='".$nomProduit."') and (nomParfum='".$nomParfum."')";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()>=1)
		{
			// Insert the new item to the parcel
			$query_cmd = "DELETE FROM colisitemslist WHERE (idColis='".$idColis."') and (nomProduit='".$nomProduit."') and (nomParfum='".$nomParfum."')";
			$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
		}
	}	
?>