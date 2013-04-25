<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/script_customers.js"></script>
<?php 
	include_once("connex.php");
	$orderby = trim($_POST['orderby']);
?>

	<h3>List of customers</h3>
<table class="table table-hover">
	<tr>
		<td class="span2"><a  href="#" id="TriFirstName" > First Name : </a></td>
		<td class="span2"><a  href="#" id="TriLastName" > Last Name : </a></td>
		<td class="span1"> Email : </td>
		<td class="span1"> N. Teleph. 1:</td>
		<td class="span1"> N. Teleph. 1:</td>
		<td class="span2"> Adress : </td>
	</tr>
	
	<?php
		$query_cmd 	= 'SELECT * FROM customers ORDER BY '.$orderby.' DESC ';
		$reponse 	= $bdd->query($query_cmd);
		while($donnees 	= $reponse->fetch())
		{
			$idCustomer   	=$donnees['idCustomer'];
			$firstNameCustomer   	=$donnees['firstNameCustomer'];
			$lastNameCustomer	=$donnees['lastNameCustomer'];
			$emailCustomer	=$donnees['emailCustomer'];
			$telCustomer1	=$donnees['telCustomer1'];
			$telCustomer2	=$donnees['telCustomer2'];
			$adressCustomer	=$donnees['adressCustomer'];
			echo '<tr>
					<td>'.$firstNameCustomer.'</td>
					<td>'.$lastNameCustomer.'</td>
					<td>'.$emailCustomer.'</td>
					<td>'.$telCustomer1.'</td>
					<td>'.$telCustomer2.'</td>
					<td>'.$adressCustomer.'</td>
				 </tr>';
		}	
	?>
</table>

