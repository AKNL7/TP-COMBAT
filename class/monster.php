<?php

class Monster
{

    private string $name;
    private int $health_point;

    public function __construct()
    {
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setHpoint($health_point): void
    {
        $this->health_point = $health_point;
    }

    public function getHpoint(): int
    {
        return $this->health_point;
    }

    public function hit(Hero $hero) {
        $damage = rand(0,40);
        $heroHealthPoint = $hero->getHp(); 
        $hero->setHp($heroHealthPoint - $damage);

        return $damage; 
        
    }
}
