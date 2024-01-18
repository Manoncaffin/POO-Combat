<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

$fight = new HeroesManager($db);
$allId = $heroesManager->find();

if(isset($_POST['hero_id'])){
    $hero=$fight->find($_POST['hero_id']);
    
}
class FightsManager {

}

?>