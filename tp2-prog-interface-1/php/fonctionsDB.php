<?php
	$connexion = connectDB();
	
	function connectDB() {
		define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
		//define('DB_PASSWORD', 'root');			// MAC
        define('DB_PASSWORD', '');			// Windows

        $laConnexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
				
		if (!$laConnexion) {
			// La connexion n'a pas fonctionné
			die('Erreur de connexion à la base de données. ' . mysqli_connect_error());
		}
		
		$selected = mysqli_select_db($laConnexion, 'to-do-list');

		if(!$selected) {
			die('La base de données n\'existe pas.');
		}
		
		mysqli_query($laConnexion, 'SET NAMES "utf8"');
		return $laConnexion;
	}
	
	function executeRequete($requete) {
		global $connexion;
		$resultats = mysqli_query($connexion, $requete);
		return $resultats;
	}
	
	function getAllTasks() {
		return executeRequete('SELECT id, tache, `description`, importance from taches');		
	}
	
	function deleteTask($id) {
		return executeRequete("DELETE FROM taches WHERE id = $id");
	}

	function addTask($tache, $description, $importance) {
		return executeRequete("INSERT INTO taches (tache, description, importance) VALUES ('$tache', '$description', '$importance')", true);
	}

	function getAllTasksByImportance() {
		return executeRequete("SELECT id, tache, `description`, importance from taches ORDER BY importance");
	}

	function getAllTasksByOrdreAlphabetique() {
		return executeRequete("SELECT id, tache, `description`, importance from taches ORDER BY tache");
	}
	
?>