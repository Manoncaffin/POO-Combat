<?php

require_once('./config/autoload.php');
require_once('./config/db.php');

$heroesManager = new HeroesManager($db);
$allHeroes = $heroesManager->findAllAlive();

// var_dump($allHeroes);

// session_start();

// Dans une condition, si des données POST['name'] existent, 
// créer une instance de HeroesManager($db) en lui fournissant la connexion à la base de données.
if (
    isset($_POST["name"]) && !empty($_POST["name"])
) {
    // je crée une nouvelle instance de la classe HeroesManager en lui fournissant la connexion à la base de données
    $heroesManager = new HeroesManager($db);
    // je crée une nouvelle instance de la classe Hero avec le nom récupéré du formulaire
    $hero = new Hero([
        'name' => $_POST["name"]
    ]);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Punchline-combat</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex justify-content-center pt-5">
                <a class="titre text-decoration-none text-black" href="#">Punchline-combat</a>
            </div>
        </nav>
    </header>

    <main>
        <!-- 
    <div class="choix container-fluid d-flex justify-content-around">
        <a class="text-decoration-none text-black" href="#">Jouer</a>
        <a class="text-decoration-none text-black" href="#">Choisir</a>
      </div> -->

        <session id="connect">
            <div class="formulaire-one d-flex justify-content-center text-black">
                <form method="POST">
                    <label for="pseudo">Entrez votre pseudo</label>
                    <input type="text" name="name" id="pseudo" placeholder="Pseudo">
                    <button type="submit" class="button-with-shadow">Valider</button>
                </form>
            </div>
        </session>


        <session id="heroes" class="pt-5 pb-5 d-flex justify-content-center align-items-center" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="heroes col-6 card-body">
                <!-- Crée une instance de la classe Hero pour chaque ligne de la base de données -->
                <?php foreach ($allHeroes as $hero) { ?>
                <h5 class="card-title"><?php echo $hero->getName() ?></h5>
                <p class="card-text"><?php echo $hero->getPoint() ?></p>
                <form method="POST" action="./fight.php">
                    <input type="hidden" name="hero_id" value="<?php echo $hero->getId() ?>">
                    <button type="submit" class="button-with-shadow">Choisir</button>
                </form>
                
                <?php } ?>
            </div>
                </session>


        <session id="play" class="pt-5">
            <img src="./img/45950.jpg" class="fond d-flex justify-content-center" alt="Fond">
        </session>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>