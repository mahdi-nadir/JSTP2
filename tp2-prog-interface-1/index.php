
<!DOCTYPE html>
<html lang="fr_CA">
<head>
    <!-- meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>TP2 | Simon C-B</title>
	<meta name="description" content="TP2 du cours 582-21F-MA Programmation d'interface Web 1">

	<!-- styles -->
	<link rel="stylesheet" type="text/css" href="./assets/styles/styles.css">

	<!-- scripts -->
	<!-- <script src="./assets/scripts/toDoListArray.js"></script>
	<script src="./assets/scripts/App.js"></script>
	<script src="./assets/scripts/Detail.js"></script>
	<script src="./assets/scripts/Task.js"></script>
	<script src="./assets/scripts/Form.js"></script>
	<script src="./assets/scripts/SortTasks.js"></script> -->
	<script type="module" src="./assets/scripts/main.js" defer></script>
</head>

<body>
	<header>
		<h1>TP2</h1>
        <p>Un gestionnaire de tâches (to-do-list) en POO.</p>
        <hr>
	</header>
	<main>

        <section>
            <h3>Ajouter une tâche</h3>
            <form data-js-form>
                <div>
                    <label for="task">Nouvelle tâche : </label>
                    <input type="text" id="task" name="task">
                </div>

                <div>
                    <label for="description">Description : </label>
                    <input type="text" id="description" name="description">
                </div>

                <div>
                    <label for="haute">Haute : </label>
                    <input type="radio" id="haute" name="importance" value="1">
                    <label for="moyenne">Moyenne : </label>
                    <input type="radio" id="moyenne" name="importance" value="2">
                    <label for="basse">Basse : </label>
                    <input type="radio" id="basse" name="importance" value="3">
                </div>

                <div>
                    <button data-js-btn>Ajouter</button>
                </div>
            </form>
        </section>

        <section class="to-do-list">
            <h3>Liste des tâches</h3>

            <div data-js-tasks>
            <?php
            require_once('./php/fonctionsDB.php');
            $taches = getAllTasks();
            while ($tache = mysqli_fetch_assoc($taches)) {
                echo "<div data-js-tache={$tache['id']}>
                        <p>
                            <span>
                                <small><b>Tâche {$tache['id']} : </b></small>{$tache['tache']}
                            </span>
                            -
                            <span>
                                <small><b>Importance : </b></small>{$tache['importance']}
                            </span>
                            <button data-js-show-detail>Afficher le détail</button>
                            <button data-js-delete>Supprimer</button>
                        </p>
                    </div>";
            }
            ?>
            </div>

            <template data-js-template-task>
                <div data-js-task>
                    <p>
                        <span>
                            <small><b>Tâche {{id}} : </b></small>{{tache}}
                        </span>
                        -
                        <span>
                            <small><b>Importance : </b></small>{{importance}}
                        </span>
                        <button data-js-show-detail>Afficher le détail</button>
                        <button data-js-delete>Supprimer</button>
                    </p>
                </div>
            </template>

            <div class="to-do-list__actions" data-js-sort-tasks>
                <button name="alpha" data-js-sort="tache">Trier par ordre alphabétique</button>
                <button name="importance" data-js-sort="importance">Trier par importance</button>
            </div>
        </section>

        <section class="detail detail--ouvert" data-js-section-detail>
            <h3>Détail d'une tâche</h3>

            <div class="chevron chevron--top" data-js-chevron></div>

            <div class="detail__result" data-js-task-detail></div>

            <template data-js-template-task-detail>
                <div data-js-div-task-detail>
                    <p><small><b>Tâche : </b></small>{{tache}}</p>
                    <p><small><b>Description : </b></small>{{description}}</p>
                    <p><small><b>Importance : </b></small>{{importance}}</p>
                </div>
            </template>

        </section>
</body>
</html>