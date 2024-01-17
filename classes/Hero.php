<?php
require_once('./config/db.php');
// propriétés de Hero
class Hero 
{
    private string $name;
    private int $health_point = 10;

// constructeur de Hero
    public function __construct(array $data) {
        $this->name = $data['name'];
        $this->health_point = $data['health_point'];
    }

// méthode Hit vide pour le moment
    // public function hit($action);
    // {
    //     $this->name = $action;
    //     $this->health_point = $health_point;
    // }

    public function getName() : string
    {
        return $this->name;
    }

    public function getPoint() : int
    {
        return $this->health_point;
    }
}

?>