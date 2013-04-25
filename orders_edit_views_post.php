<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_orders.js"></script>
 <?php
	session_start();
	include_once("connex.php");
	
    $numCommande=trim($_POST['numCommande']);
	$numCommandeOld=trim($_POST['numCommandeOld']);
	$codeColis=trim($_POST['codeColis']);
	$dateCommande=trim($_POST['dateCommande']);
	$dateReceptionCommande=trim($_POST['dateReceptionCommande']);
	
	// UPDATE the information of th parcel.
	if ($numCommande==$numCommandeOld)// Cas ou l'Id du colis n'a pas ete modifie
	{
		$query_cmd ="SELECT * FROM orders WHERE numCommande='".$numCommande."'";
		if($reponse = ($bdd->query($query_cmd)))
		{
			$donnees 	= $reponse->fetch();
			// Tester si un des attribut est change
			if(($codeColis!=$donnees['codeColis'])or($dateCommande!=$donnees['dateCommande'])or($dateReceptionCommande!=$donnees['dateReceptionCommande'])){
				$query_cmd = 'UPDATE orders SET dateCommande="'.$dateCommande.'",dateReceptionCommande="'.$dateReceptionCommande.'",codeColis="'.$codeColis.'" WHERE numCommande="'.$numCommande.'"';
				$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
			}
			?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				Well done! The reccord is apdated successfully.
			</div>
			<?php
		}
	}
	else
	{
		$query_cmd ="SELECT * FROM orders WHERE numCommande='".$numCommande."'";
		if($reponse = ($bdd->query($query_cmd)))
		{
			if($reponse->fetchColumn()<1)
			{
				$query_cmd = 'UPDATE orders SET numCommande="'.$numCommande.'",dateCommande="'.$dateCommande.'",dateReceptionCommande="'.$dateReceptionCommande.'",codeColis="'.$codeColis.'" WHERE numCommande="'.$numCommandeOld.'"';
				$bdd->exec($query_cmd) or die($msg."<br />Error Order!<br />");
				?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Well done! The reccord is apdated successfully.
				</div>
				<?php
			}
			else
			{				
				?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Ooops! This order's number already exists.
				</div>
				<?php
			}
		}
	}
?>