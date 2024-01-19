<?php
require_once('./config/db.php');

    // propriétés de Hero
class Hero 
{
    private string $name;
    private int $health_point = 100;
    private $id; 

    // constructeur de Hero // data est un nom choisi qui n'a pas d'importance
    public function __construct(array $data) {
        $this->name = $data['name'];
    }

    // méthode Hit du combat entre le héro et le monstre
    public function hit(Monster $monster) : int
    {
        $damage = rand(0,50);
        $monsterHealthPoint = $monster->getPointMonster();
        $monster->setPointMonster($monsterHealthPoint - $damage);

        return $damage;
    }

    public function setName($name) : void
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setPoint($health_point) : void
    {
        $this->health_point = $health_point;
    }

    public function getPoint() : int
    {
        return $this->health_point;
    }

    public function setId($id)  : void
    {
        $this->id = $id;
    }

    public function getId() : int
    {
        return $this->id;
    }

}

?>