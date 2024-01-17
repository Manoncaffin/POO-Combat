<?php

require_once('./classes/FightsManager.php');
require_once('./classes/Hero.php');
require_once('./classes/HeroesManager.php');
require_once('./classes/Monster.php');
require_once('./config/db.php');

// session_start();

// Dans une condition, si des données POST['name'] existent, 
// créer une instance de HeroesManager($db) en lui fournissant la connexion à la base de données.
if(
    isset($_POST["name"]) && !empty($_POST["name"])) {
        // je crée une nouvelle instance de la classe HeroesManager en lui fournissant la connexion à la base de données
    $heroesManager = new HeroesManager($db);
        // je crée une nouvelle instance de la classe Hero avec le nom récupéré du formulaire
    $hero = new Hero([
        'name' => $_POST["name"]]);
        // j'appelle la méthode add() du manager en lui donnant comme argument 
        // une nouvelle instance de la classe Hero
    $heroesManager->add($hero);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combat</title>
</head>
<body>

<main>
    <div class="d-flex justify-content-center">
    <form method="POST">
        <input name="name">
        <button type="submit">Envoyer</button>
    </form>
    </div>


</main>
    
</body>
</html>