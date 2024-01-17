<?php
require_once('./config/db.php');

class HeroesManager {

    private $db;

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
        $heroes = [];
        foreach ($allHeroes as $data) {
            // Crée une instance de la classe Hero pour chaque ligne de la base de données
            $hero = new Hero ($data);
            $heroes[] = $hero;
        }
        return $heroes;

        var_dump($hero);
    }




}

?>