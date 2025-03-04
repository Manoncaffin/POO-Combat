<?php
require_once('./config/db.php');

class Monster
{
    private string $monsterName;
    private int $monsterHealth_point = 100;

    public function setNameMonster($name): void
    {
        $this->monsterName = $name;
    }

    public function getNameMonster(): string
    {
        return $this->monsterName;
    }

    public function setPointMonster($health_point): void
    {
        $this->monsterHealth_point = $health_point;
    }

    public function getPointMonster(): int
    {
        return $this->monsterHealth_point;
    }

    // méthode Hit du combat entre le héro et le monstre
    public function hit(Hero $hero): int
    {
        $damage = rand(0, 50);
        $health_point = $hero->getPoint();
        $hero->setPoint($health_point - $damage);

       
        echo "<p class='typo-two text-center'>"  . $this->monsterName . " lui rétorque " . $damage . " punchlines !</p>";

        return $damage;
    }
}
