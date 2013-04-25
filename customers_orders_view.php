<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_customers_orders.js"></script>
<?php 
	include_once("connex.php");
	$orderby = trim($_POST['orderby']);
?>
	<h3> List of customer's orders list </h3>
    <br/>
	
	<div class="accordion-group">
		<div class="accordion-heading"> 
			<div class="accordion-toggle row" data-parent="#monaccordeon" data-toggle="collapse">
				<label class="span3 offset1">
					<a href="#" id="TriNumCommandeClt" > Order number </a>
				</label>
				<label class="span3"><a  href="#" id="TriDateCommandeClt" > Order date </a></label>
				<label class="span2"><a  href="#" id="TriDateReceptionCommandeClt" > Reception date </a></label>
				<label class="span2"><a  href="#" id="TriIdCustomer" > Customer Id </a></label>
			</div>
		</div>
	</div>	

	<?php
		$query_cmd 	= 'SELECT * FROM customersorders ORDER BY '.$orderby.' DESC ';
		$reponse 	= $bdd->query($query_cmd);
		$i=1;
		while($donnees 	= $reponse->fetch())
		{
			$numCommande	=$donnees['numCommande'];
			$dateCommande	=$donnees['dateCommande'];
			$dateReceptionCommande	=$donnees['dateReceptionCommande'];
			$idCustomer		=$donnees['idCustomer'];
			echo 
			'<div class="accordion-group">
				<div class="accordion-heading"> 
					<div class="accordion-toggle row" href="#item2'.$i.'" data-parent="#monaccordeon" data-toggle="collapse">
						<label class="span1"><b class="caret"></b></label>
						<label class="span3">'.$numCommande.'</label>
						<label class="span3">'.$dateCommande.'</label>
						<label class="span2">'.$dateReceptionCommande.'</label>
						<label class="span2">'.$idCustomer.'</label>
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
							$query_cmd1 = 'SELECT * FROM customersordersitems WHERE numCommande="'.$numCommande.'"';
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