<?php
try
{
    // On se connecte � MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=durance', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arr�te tout
        die('Erreur : '.$e->getMessage());

}
?>
