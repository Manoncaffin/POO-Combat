<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

class FightsManager 
{

public function createMonster()
{
    // Crée un nouvel objet Monster avec un nom de votre choix et une santé de 100
    $newMonster = new Monster();
    $newMonster->setNameMonster("Monstre");
    return $newMonster;
}

public function fight(Hero $hero, Monster $monster)
{
    var_dump($hero);

    $hero->hit($monster);
    var_dump($monster);
    $monster->hit($hero);
    var_dump($hero);
    // Tableau pour stocker le déroulé du combat
    $arrayCombat = []; 

    while($hero->getPoint() > 0 && $monster->getPointMonster() > 0) {
        $monster->hit($hero);
        $hero->hit($monster);


    }
    
    return $arrayCombat;
}

}







?>