<?php

class heroesManager
{

    private PDO $db;
    // c'est une instance de la class PDO donc $db est un objet PDO

    public function __construct(PDO $db)
    {
        $this->db = $db;
        // on type avec PDO pour ne pas recevoi autre chosie 
    }

    public function add(Hero $heros): void
    {
        $request = $this->db->prepare('INSERT INTO heroes (name) VALUES (:name)');
        $request->execute([
            'name' => $heros->getName()
        ]);

        $id = $this->db->lastInsertId();
        $heros->setId($id);
    }

    public function findAllAlive(): array
    {
        $request = $this->db->query('SELECT * FROM heroes WHERE heroes.health_point > 0');
        // cette requête retourne un tableau de hero qui ont des points de vie supérieur à 0
        $heroesAlives = $request->fetchAll();
        // var_dump($heroesAlive); pour voir les heros

        $heroes = []; //doit stocker les instances de la classe Hero

        foreach ($heroesAlives as $heroAlive) {
            $hero = new Hero($heroAlive);
            $heroes[] = $hero;
        }


        return $heroes; // il doit nous renvoyer des ojets hero
    }

    public function find(int $id): Hero
    {
        $request = $this->db->prepare('SELECT * FROM heroes WHERE id = :id');
        $request->execute([
            ':id' => $id,
        ]);

        $foundHero = $request->fetch();
        // juste fetch() car on chercher un hero precis avec l'id

        // var_dump($foundHero);
        $hero = new Hero($foundHero);
        return $hero;
    }

    public function update(Hero $hero)
    {
        $request = $this->db->prepare('UPDATE heroes SET health_point = :health_point WHERE id = :id');
        $request->execute([
            ':health_point' => $hero->getHp(),
            ':id' => $hero->getId(), // on reprends toujours les valeurs, l'objet qu'on doit update puis on appelle les get 
        ]);
    }
}
