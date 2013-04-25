<script type="text/javascript" src="js/script.js"></script>
 <script type="text/javascript" src="js/script_parcels.js"></script>
 <?php
	session_start();
	include_once("connex.php");
	
    $idColis=trim($_POST['idColis']); // Nouveau Id de colis
 	$idColisOld=trim($_POST['idColisOld']); //ancien Id de colis
	$codeColis=trim($_POST['codeColis']); 
	$dateEnvoiColis=trim($_POST['dateEnvoiColis']);
	$dateReceptionColis=trim($_POST['dateReceptionColis']);
	
	if ($idColis==$idColisOld)// Cas ou l'Id du colis n'a pas ete modifie
	{
		$query_cmd ="SELECT * FROM colis WHERE idColis='".$idColis."'";
		if($reponse = ($bdd->query($query_cmd)))
		{
			$donnees = $reponse->fetch();
			if ($codeColis==$donnees['codeColis']) // cas codeColis non modifie.
			{
				// Tester si un des attribut est change
				if(($dateEnvoiColis!=$donnees['dateEnvoiColis'])or($dateReceptionColis!=$donnees['dateReceptionColis'])){
					$query_cmd = 'UPDATE colis SET idColis="'.$idColis.'",codeColis="'.$codeColis.'",dateEnvoiColis="'.$dateEnvoiColis.'",dateReceptionColis="'.$dateReceptionColis.'" WHERE idColis="'.$idColis.'"';
					$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
				}
				?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					Well done! The reccord is apdated successfully.
				</div>
				<?php
			}
			else{
				$query_cmd ="SELECT * FROM colis WHERE codeColis='".$codeColis."'";
				if($reponse = ($bdd->query($query_cmd)))
				{
					if($reponse->fetchColumn()<1)
					{
						// UPDATE the information of the parcel.
						$query_cmd = 'UPDATE colis SET idColis="'.$idColis.'",codeColis="'.$codeColis.'",dateEnvoiColis="'.$dateEnvoiColis.'",dateReceptionColis="'.$dateReceptionColis.'" WHERE idColis="'.$idColisOld.'"';
						$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
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
							Ooops! This parcel's code already exists.
						</div>
						<?php
					}
				}
			}
		}
	}
	else{ // cas ou Id du colis est modifie
		$query_cmd ="SELECT * FROM colis WHERE idColis='".$idColis."'";
		if($reponse = ($bdd->query($query_cmd)))
		{
			if($reponse->fetchColumn()<1) //Tester si le nouveau idColis n'existe pas 
			{
				$query_cmd = 'UPDATE colis SET idColis="'.$idColis.'",codeColis="'.$codeColis.'",dateEnvoiColis="'.$dateEnvoiColis.'",dateReceptionColis="'.$dateReceptionColis.'" WHERE idColis="'.$idColisOld.'"';
				$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
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
					Ooops! This parcel's Id already exists.
				</div>
				<?php
			}
		}
	}
?>