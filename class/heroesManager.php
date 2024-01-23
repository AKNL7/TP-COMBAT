<?php

require_once './class/hero.php';

class HeroesManager {
     
    private PDO $db;


    public function __construct(PDO $db) {
        $this->db = $db; 
    }

    public function add (Hero $heros) {
        $request= $this->db->prepare('INSERT INTO heroes (name) VALUES (:name)');
        $request->execute([ 
           'name'=> $heros->getName()
        ]);

        $id= $this->db->lastInsertId();
        $heros->setId($id);
    }

    public function findAllAlive() {
        $request = $this->db->query("SELECT * FROM heroes WHERE heroes
        .health_point > 0"); 
        $heroesAlives = $request->fetchAll();

        $heroes = [];

        foreach ($heroesAlives as $heroAlive) {
            $hero = new Hero($heroAlive); 
            $hero->setId($heroAlive['id']); 
            $hero->setHealthPoint($heroAlive['health_point']);
            $heroes[] = $hero; 
          
            
        }
        return $heroes;
    }

    //    public function hydrate(array $data) {
    //     $heroesAlive = [];
    //     foreach ($data as $hero){
    //     $newHero = new Hero ($hero);
    //     $heroesAlive[]= $newHero;

        
             
             

          }
        
    


