<?php
require_once('./config/db.php');

class HeroesManager {
    private $db;

    public function __construct($db) 
    {
        // j'instancie la classe HeroesManager avec la connexion à la base de données
        // car je vais avoir besoin de cette connexion pour faire mes requêtes SQL
        $this->db = $db;
    }

    public function add($Hero) {
        $request = $this->db->prepare('INSERT into heroes (name, health_point)
        VALUES (:name, :health_point)');
        $request->execute([
            // Utilisez la méthode getName() de l'objet Hero passé en argument
            'name' => $Hero->getName(),
            // 'health_point' => 10,
        ]);
    }




}

?>