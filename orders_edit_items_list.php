 <?php
	
	session_start();
	include_once("connex.php");
	
    $numCommande    =trim($_POST['numCommande']);
	$nomProduit     =trim($_POST['nomProduit']);
	$nomParfum      =trim($_POST['nomParfum']);
	$prixProduit    =trim($_POST['prixProduit']);
	$quantiteProduit=trim($_POST['quantiteProduit']);
	
	$query_cmd ="SELECT * FROM ordersitemslist WHERE (numCommande='".$numCommande."') and (nomProduit='".$nomProduit."') and (nomParfum='".$nomParfum."')";
	if($reponse = ($bdd->query($query_cmd)))
	{
		if($reponse->fetchColumn()<1)
		{
			// Insert the new item to the parcel
			$query_cmd = 'INSERT INTO ordersitemslist VALUES("'.$numCommande.'","'.$nomProduit.'","'.$nomParfum.'","'.$prixProduit.'","'.$quantiteProduit.'")';
			$bdd->exec($query_cmd) or die($msg."<br />Error Colis!<br />");
		}
	}
?>