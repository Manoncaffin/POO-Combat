<?php
require_once('./config/db.php');
// propriétés de Hero
class Hero 
{
    private $name;
    private $health_point = 100;
    private $id; 

// constructeur de Hero
    public function __construct(array $data) {
        $this->name = $data['name'];
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

    public function setId($id) {
        $this->id = $id;
    }

}

?>