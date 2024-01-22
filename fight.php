<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

$heroesManager = new HeroesManager($db);
if (isset($_POST['hero_id'])) {
    // $hero=$fight->find($_POST['hero_id']);
    $hero = $heroesManager->find($_POST['hero_id']);
}

// démarrage du fight
// nouvelle instance de la classe FightsManager est créée
$fightsManager = new FightsManager();
// la méthode createMonster() de l'objet $fightsManager est appelée pour instancier 
// un nouveau monstre. Cette méthode est définie dans la classe FightsManager.
// Elle est responsable de créer un objet Monster avec un nom spécifique et une santé initiale.
$monster = $fightsManager->createMonster();
// La méthode fight($hero, $monster) est appelée sur l'objet $fightManager. 
// Cette méthode devrait contenir la logique du combat, où les points de vie du héros 
// et du monstre sont ajustés en fonction de l'issue du combat. 
// La variable $fightResults pourrait stocker des informations sur le combat, 
// telles que le gagnant, le nombre de tours, etc.
$fightResults = $fightsManager->fight($hero, $monster);
// La méthode update($hero) de l'objet $heroesManager est appelée pour mettre à jour 
// les informations du héros après le combat. Cette méthode devrait probablement enregistrer 
// les modifications dans la base de données, mettant à jour les points de vie du héros, par exemple.
$heroesManager->update($hero);


// boucle foreach pour affichage combat 
// foreach ($arrayCombats as $arrayCombat)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Punchline-combat</title>
</head>

<body>
<main>

    <session id="play" class="pt-5 m-1">
        <img src="./img/45950.jpg" class="fond d-flex justify-content-center" alt="Fond">
    </session>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>