 <?php
	//session_start();
	include_once("connex.php");
	
    $idColis=trim($_POST['idColis']);
	$nomProduit=trim($_POST['nomProduit']);
	$nomParfum=trim($_POST['nomParfum']);
	$quantiteProduit=trim($_POST['quantiteProduit']);
	
	$query_cmd ="SELECT * FROM colisitemslist WHERE (idColis='".$idColis."') and (nomProduit='".$nomProduit."') and (nomParfum='".$nomParfum."')";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
			// Insert the new item to the parcel
			$query_cmd = 'INSERT INTO colisitemslist VALUES("'.$idColis.'","'.$nomProduit.'","'.$nomParfum.'","'.$quantiteProduit.'")';
			$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
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
				Ooops! The parcel's "Code" already exists.
			</div>
			<?php
		}
	}	
?>