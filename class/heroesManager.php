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

    public function findAllAlive()
    {
        $request = $this->db->query('SELECT * FROM heroes WHERE health_point > 0');
        $heroesAlive = $request->fetchAll();
        // var_dump($heroesAlive); pour voir les heros

        return $heroes = []; //doit stocker les instances de la classe Hero

        foreach ($heroesAlive as $heroAlive) {
            $hero = new Hero($heroAlive);
            $heroes[] = $hero; 
            
        }
 var_dump($heroes); 
       
        return $heroes; // il doit nous renvoyer des ojets hero
    }
}
