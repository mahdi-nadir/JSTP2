<?php

	// Pour accéder à la base de données
	require_once('./fonctionsDB.php');
	
	$tableau = array();

	// Obtenir les équipes dans la BD
	$taches = getAllTasks($_GET['id']);

	// Boucler sur les taches obtenues
	while ($tache = mysqli_fetch_assoc($taches)) {
		$tableau[] = $tache;
    }

	header('Content-type: application/json; charset=utf-8');
	echo json_encode($tableau);
	
?>