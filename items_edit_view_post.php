<?php
	include_once("connex.php");
	$nomProduit=trim($_POST['nomProduit']);
	$nomProduitOld=trim($_POST['nomProduitOld']);
	$typeProduit=trim($_POST['typeProduit']);
	$marqueProduit=trim($_POST['marqueProduit']);
	
	if($nomProduit==$nomProduitOld)
	{
		$query_cmd = "SELECT * FROM items WHERE nomProduit='".$nomProduit."'";
		if($reponse = ($bdd->query($query_cmd)))
		{
			$donnees = $reponse->fetch();
			if(($typeProduit!=$donnees['typeProduit']) or ($marqueProduit!=$donnees['marqueProduit']))
			{
				$query_cmd = 'UPDATE items SET typeProduit="'.$typeProduit.'",marqueProduit="'.$marqueProduit.'" WHERE nomProduit="'.$nomProduit.'"';
				$bdd->exec($query_cmd) or die($msg."<br />Error Produit!<br />");
			}
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The reccord is saved successfully.
			</div>
			<?php
		}	
	}
	else
	{
		$query_cmd ="SELECT * FROM items WHERE nomProduit='".$nomProduit."'";
		if($reponse = ($bdd->query($query_cmd)))
		{
			if($reponse->fetchColumn()<1)
			{
				$query_cmd = 'UPDATE items SET nomProduit="'.$nomProduit.'",typeProduit="'.$typeProduit.'",marqueProduit="'.$marqueProduit.'" WHERE nomProduit="'.$nomProduitOld.'"';
				$bdd->exec($query_cmd) or die($msg."<br />Error Produit!<br />");
				?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Well done! The reccord is saved successfully.
				</div>
				<?php
			}
			else 
			{
				?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Ooops! This product's name already exists.
				</div>
				<?php	
			}
		}
	}

?>
 