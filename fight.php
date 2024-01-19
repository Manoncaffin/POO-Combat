<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

$heroesManager = new HeroesManager($db);

$allId = $heroesManager->find($_POST['hero_id']);

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

if(isset($_POST['hero_id'])){
    $hero=$fight->find($_POST['hero_id']);
    
}
// boucle foreach pour affichage combat 
// foreach ($arrayCombats as $arrayCombat)
?>