<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

class FightsManager 
{

public function createMonster()
{
    // Crée un nouvel objet Monster avec un nom de votre choix et une santé de 100
    $newMonster = new Monster();
    return $newMonster;
}

public function fight($hero, $monster)
{
    // Tableau pour stocker le déroulé du combat
    $arrayCombat = []; 

    while ($hero->getPoint() && $monster->getPointMonster()) {
        // Le monstre attaque en premier
        $monster->hit($hero);
        // Je vérifie si le héros a survécu
        if ($hero->getPoint($hero < 0)) {
            // Si le héros est toujours en vie, il contre-attaque
            $hero->hit($monster);
        }
        // Enregistre les événements du combat dans le tableau
        $arrayCombat[] = "Le monstre inflige $monster points de punchlines au héros.";
        if ($hero->getPoint($hero < 0)) {
            $arrayCombat[] = "Le vainqueur contre-attaque et inflige $hero points de punchlines au monstre.";
        } else {
            $arrayCombat[] = "Le vainqueur est vaincu.";
        }
    }
    // Cette méthode retourne un tableau contenant en 'string' le déroulé du combat 
    // qu’on pourra ensuite afficher dans fight.php avec une simple boucle foreach.
    return $arrayCombat;
}

}







?>