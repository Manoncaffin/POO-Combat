<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

class HeroesManager {

    private $db;
    private array $heroesArray = [];

    public function __construct(PDO $db) 
    {
        // j'instancie la classe HeroesManager avec la connexion à la base de données
        // car je vais avoir besoin de cette connexion pour faire mes requêtes SQL
        $this->db = $db;
    }

    public function add($hero) {
        $request = $this->db->prepare("INSERT INTO heroes (name)
        VALUES (:name)");
        $request->execute([
            // j'utilise la méthode getName() de l'objet Hero passé en argument
            'name' => $hero->getName(),
        ]);
        $id = $this->db->lastInsertId();
        $hero->setId($id);
    }

    public function findAllAlive() {
        // clause WHERE health_point > 0 pour récupérer uniquement les héros en vie
        $request = $this->db->query("SELECT * FROM heroes WHERE health_point > 0");
        $allHeroes = $request->fetchAll();
        // Pour chaque élément dans $allHeroes, où $hero prend la valeur de chaque élément successivement
        foreach ($allHeroes as $hero) { 
        // On crée un nouvel objet de la classe Hero en utilisant la valeur actuelle de $hero comme argument du constructeur
        $newHero = new Hero ($hero);
        // On appelle la méthode setId de l'objet $newHero en lui passant la valeur de 'id' de l'élément actuel dans $allHeroes
        $newHero->setId($hero['id']);
         // On ajoute l'objet $newHero à la propriété $heroesArray de l'objet actuel
        $this->heroesArray[]=$newHero;
        }
        // Une fois la boucle terminée, on retourne la propriété $heroesArray de l'objet actuel
        return $this->heroesArray;
    }

    public function find(int $id) {
        $request = $this->db->query("SELECT * FROM heroes WHERE id $id");
        $fightHero=$request->fetch();

        $hero = new Hero($fightHero);
        return $hero;
    }

}



?>