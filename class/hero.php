<?php

class Hero
{
    private int $id;
    private string $name;
    private int $health_point = 100;

    public function __construct(array $data)
    {
        $this->hydrate($data); // passe le tableau a la methode hydrate

        // si on defini le nom dans le constructeur on a pas besoin dans la page index d'appeler la fonction setName()
    }

    public function hydrate(array $data): void
    {
        if (isset($data['id']) && !empty($data['id'])) {
            $this->id = $data['id'];
        }

        if (isset($data['name']) && !empty($data['name'])) {
            $this->name = $data['name'];
        }

        if(isset($data['health_point']) && !empty($data['health_point'])) {
            $this->health_point = $data['health_point'];
        }

        // si on veut rajouter des propriéte on le fera dans les attributs et ici
        
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setHp($health_point): void
    {
        $this->health_point = $health_point;
    }

    public function getHp(): int
    {
        return $this->health_point;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function hit(Monster $monster)
    {
        $damage = rand(0,40);
        $monsterHealthPoint = $monster->getHpoint(); 
        $monster->setHpoint($monsterHealthPoint - $damage); 

        return $damage;
    }
}
