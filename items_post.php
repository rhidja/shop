<?php
	include_once("connex.php");
	$nomProduit=trim($_POST['nomProduit']);
	$typeProduit=trim($_POST['typeProduit']);
	$marqueProduit=trim($_POST['marqueProduit']);
	
	$query_cmd ="SELECT * FROM items WHERE nomProduit='".$nomProduit."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
			// Insert the new item to the parcel
			$query_cmd = "INSERT INTO items (nomProduit,typeProduit,marqueProduit)VALUES('".$nomProduit."','".$typeProduit."','".$marqueProduit."')";
			$bdd->exec($query_cmd) or die($msg."<br />Error Produit!<br />");
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The reccord is saved successfully.
			</div>
			<?php
		}
		else{
			?>
			<div class="alert alert-error">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Ooops! This item's number already exists.
			</div>
			<?php
		}
	}
?>
 