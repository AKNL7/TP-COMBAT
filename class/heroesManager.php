<?php

require_once './class/hero.php';

class HeroesManager {
     
    private PDO $db;


    public function __construct($db) {
        $this->db = $db; 
    }

    public function add (Hero $heros) {
        $request= $this->db->prepare('INSERT INTO heroes (name) VALUES (:name)');
        $request->execute([ 
           'name'=> $heros->getName()
        ]);

        $id= $this->db->lastInsertId();
    }
}

