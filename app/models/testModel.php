<?php
$sth = $dbh->prepare("SELECT nom, couleur FROM fruit");
$sth->execute();

/* Récupération de toutes les lignes d'un jeu de résultats */
print("Récupération de toutes les lignes d'un jeu de résultats :\n");
$result = $sth->fetchAll();
print_r($result);
?>