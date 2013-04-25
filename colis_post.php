<?php
	/*
		= L'enrigistrement d'un nouveau colis avec : 
		  - Test sur l'unicite du "idColis"
		  - Test sur l'unicite du "codeColis"
	*/
	session_start();
	include_once("connex.php");
	
    $idColis=trim($_POST['idColis']);
	$codeColis=trim($_POST['codeColis']);
	$dateEnvoiColis=trim($_POST['dateEnvoiColis']);
	$dateReceptionColis=trim($_POST['dateReceptionColis']);
	
	$query_cmd ="SELECT * FROM colis WHERE idColis='".$idColis."'";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
			$query_cmd ="SELECT * FROM colis WHERE codeColis='".$codeColis."'";
			if($reponse = ($bdd->query($query_cmd)))
			{
				if($reponse->fetchColumn()<1)
				{	
					$query_cmd = "INSERT INTO colis VALUES('".$idColis."','".$codeColis."','".$dateEnvoiColis."','".$dateReceptionColis."')";
					$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
					?>
					<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Well done! The reccord is saved successfully.
					</div>
					<?php
				}
				else{
					if($codeColis!='')
					{
					?>
					<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						Ooops! The parcel's "Code" already exists.
					</div>
					<?php
					}
					else{
						$query_cmd = "INSERT INTO colis VALUES('".$idColis."','".$codeColis."','".$dateEnvoiColis."','".$dateReceptionColis."')";
						$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
						?>
						<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							Well done! The reccord is saved successfully.
						</div>
						<?php
					}
				}
			}
		}
		else{
		?>
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			Ooops! The parcel's "Id" already exists.
		</div>
		<?php
		}
	}	
?>