<?php

	// Pour accéder à la base de données
	require_once('./fonctionsDB.php');
	
	// Obtenir les équipes dans la BD
	$tache = deleteTask($_POST['id']);
	
	// Boucler sur les équipes obtenues
	
	echo $tache;
	
?>