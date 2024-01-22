<?php
require_once('./config/db.php');
require_once('./config/autoload.php');

// Heroes Manager gère les requêtes SQL
class HeroesManager {

    private $db;
    private array $heroesArray = [];

    public function __construct(PDO $db) 
    {
        // j'instancie la classe HeroesManager avec la connexion à la base de données
        // car je vais avoir besoin de cette connexion pour faire mes requêtes SQL
        $this->db = $db;
    }

    public function add($hero) 
    {
        // $this->$db car c'est une propriété qui appartient à la class
        $request = $this->db->prepare("INSERT INTO heroes (name)
        VALUES (:name)");
        $request->execute([
        // j'utilise la méthode getName() de l'objet Hero passé en argument
            'name' => $hero->getName(),
        ]);
        $id = $this->db->lastInsertId();
        $hero->setId($id);
    }

    public function findAllAlive() 
    {
        // clause WHERE health_point > 0 pour récupérer uniquement les héros en vie
        $request = $this->db->query("SELECT * FROM heroes WHERE health_point > 0");
        $allHeroes = $request->fetchAll();
        // Pour chaque élément dans $allHeroes, où $hero prend la valeur de chaque élément successivement
        foreach ($allHeroes as $hero) { 
        // Je crée un nouvel objet de la classe Hero en utilisant la valeur actuelle de $hero comme argument du constructeur
        $newHero = new Hero ($hero);
        // J'aappelle la méthode setId de l'objet $newHero en lui passant la valeur de 'id' de l'élément actuel dans $allHeroes
        $newHero->setId($hero['id']);
         // J'ajoute l'objet $newHero à la propriété $heroesArray de l'objet actuel
        $this->heroesArray[]=$newHero;
        }
        // Une fois la boucle terminée, je retourne la propriété $heroesArray de l'objet actuel
        return $this->heroesArray;
    }

    public function find(int $id) 
    {
        $request = $this->db->query("SELECT * FROM heroes WHERE id = $id");
        $fightHero=$request->fetch();

        $hero = new Hero($fightHero);
        $hero->setId($fightHero['id']);
        return $hero;
    }

    public function update(Hero $hero)
    {
        $request = $this->db->prepare("UPDATE heroes SET health_point = :health_point WHERE id = :id");
        $request->execute([
            'health_point' => $hero->getPoint(),
            'id' => $hero->getId(),
        ]);
    }
}



?>