<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_parcels.js"></script>

<?php 
	include_once("connex.php");
	$orderby = trim($_POST['orderby']);
?>
	<h3> List of parcels</h3>
    <br>
	<div class="accordion-group">
		<div class="accordion-heading"> 
			<div class="accordion-toggle row" href="#item1" data-parent="#monaccordeon" data-toggle="collapse">
				<label class="span3 offset1"><a  href="#" id="TriIdColis"> Parcel's Id </a></label>
				<label class="span3"><a  href="#" id="TriCodeColis">Parcel's code </a></label>
				<label class="span2"><a  href="#" id="TriDateEnvoiColis"> Sent date </a></label>
				<label class="span2"><a  href="#" id="TriDateReceptionColis"> Reception date </a></label>
			</div>
		</div>
	</div>	

	<?php
		$query_cmd 	= 'SELECT * FROM colis ORDER BY '.$orderby.' DESC';
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