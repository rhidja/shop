<script type="text/javascript" 	src="js/script.js"></script>
<?php include_once("connex.php");?>
<div id="alerte"></div>
<div id="content">

	<h3> Liste des colis en cours</h3>
    <br>
	<div class="accordion-group">
		<div class="accordion-heading"> 
			<div class="accordion-toggle row" href="#item1" data-parent="#monaccordeon" data-toggle="collapse">
				<label class="span3 offset1">Id Colis</label>
				<label class="span3">Code colis</label>
				<label class="span2">Date d'envoi</label>
				<label class="span2">Date de reception</label>
			</div>
		</div>
	</div>	

	<?php
		$query_cmd 	= 'SELECT * FROM colis';
		$reponse 	= $bdd->query($query_cmd);
		$i=1;
		while($donnees 	= $reponse->fetch())
		{
			$idColis	=$donnees['idColis'];
			$codeColis	=$donnees['codeColis'];
			$dateEnvoiColis		=$donnees['dateEnvoiColis'];
			$dateReceptionColis	=$donnees['dateReceptionColis'];
			
			echo 
			'<div class="accordion-group">
				<div class="accordion-heading"> 
					<div class="accordion-toggle row" href="#item1'.$i.'" data-parent="#monaccordeon" data-toggle="collapse">
						<label class="span1"><b class="caret"></b></label>
						<label class="span3">'.$idColis.'</label>
						<label class="span3">'.$codeColis.'</label>
						<label class="span2">'.$dateEnvoiColis.'</label>
						<label class="span2">'.$dateReceptionColis.'</label>
					</div>
				</div>
				<div id="item1'.$i.'" class="collapse">
					<div class="accordion-inner">
						<table id="colisItemsList" class="table table-striped">
							<tr>
								<td class="span3">Items    : </td>
								<td class="span3">Perfum   : </td>
								<td class="span2"> Quantity   : </td>
							</tr>';
							$query_cmd1 = 'SELECT * FROM colisitemslist WHERE idColis="'.$idColis.'"';
							$reponse1 = $bdd->query($query_cmd1);
							while ($donnees1 = $reponse1->fetch())
							{
								$nomProduit 	= $donnees1['nomProduit'];
								$nomParfum 		= $donnees1['nomParfum'];
								$quantiteProduit= $donnees1['quantiteProduit'];
								echo 
								'<tr><td>'.$nomProduit.'</td><td>'.$nomParfum.'</td><td>'.$quantiteProduit.'</td></tr>';
				}				
			echo        '</table>
					</div>
				</div>
			</div>';
			$i++;
		}	
	?>

	<h3> Liste des commandes en cours</h3>
    <br>
	<div class="accordion-group">
		<div class="accordion-heading"> 
			<div class="accordion-toggle row" data-parent="#monaccordeon" data-toggle="collapse">
				<label class="span3 offset1">Num de commande</label>
				<label class="span3">Date de commande</label>
				<label class="span2">Date de reception</label>
				<label class="span2">Code Colis</label>
			</div>
		</div>
	</div>	

	<?php
		$query_cmd 	= 'SELECT * FROM orders';
		$reponse 	= $bdd->query($query_cmd);
		while($donnees 	= $reponse->fetch())
		{
			$numCommande	=$donnees['numCommande'];
			$dateCommande	=$donnees['dateCommande'];
			$dateReceptionCommande	=$donnees['dateReceptionCommande'];
			$codeColis		=$donnees['codeColis'];
			
			echo 
			'<div class="accordion-group">
				<div class="accordion-heading"> 
					<div class="accordion-toggle row" href="#item2'.$i.'" data-parent="#monaccordeon" data-toggle="collapse">
						<label class="span1"><b class="caret"></b></label>
						<label class="span3">'.$numCommande.'</label>
						<label class="span3">'.$dateCommande.'</label>
						<label class="span2">'.$dateReceptionCommande.'</label>
						<label class="span2">'.$codeColis.'</label>
					</div>
				</div>
				<div id="item2'.$i.'" class="collapse">
					<div class="accordion-inner">
						<table id="colisItemsList" class="table table-striped">
							<tr>
								<td class="span3">Items</td>
								<td class="span3">Perfum</td>
								<td class="span3">Price</td>
								<td class="span2">Quantity</td>
							</tr>';
							$query_cmd1 = 'SELECT * FROM ordersitemslist WHERE numCommande="'.$numCommande.'"';
							$reponse1 = $bdd->query($query_cmd1);
							while ($donnees1 = $reponse1->fetch())
							{
								$nomProduit 	= $donnees1['nomProduit'];
								$nomParfum 		= $donnees1['nomParfum'];
								$prixProduit    = $donnees1['prixProduit'];
								$quantiteProduit= $donnees1['quantiteProduit'];
								echo 
								'<tr><td>'.$nomProduit.'</td><td>'.$nomParfum.'</td><td>'.$prixProduit.'</td><td>'.$quantiteProduit.'</td></tr>';
				}				
			echo        '</table>
					</div>
				</div>
			</div>';
			$i++;
		}	
	?>
</div>

