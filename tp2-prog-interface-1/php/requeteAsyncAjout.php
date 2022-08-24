<?php

	// Pour accéder à la base de données
	require_once('./fonctionsDB.php');
	

	// Obtenir les équipes dans la BD
	$tache = addTask($_POST['tache'], $_POST['description'], $_POST['importance']);


		echo $tache;

	
?>