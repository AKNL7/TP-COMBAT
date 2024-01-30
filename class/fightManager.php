<?php

class fightManager
{


    public function createMonster(): Monster // Attends un type Monster 
    {
        $monster = new Monster();
        $monster->setName('VenomSpine'); // pour creer le monstre on appelle les set
        $monster->setHpoint(100);
        return $monster;
    }

    public function fight(Hero $hero, Monster $monster): array // on precise bien ce qu'on veut recevoir un objet Hero et un objet Monster si on met juste la variable elle peut ê de n'importe quel type
    {
        $fight = [];
        while ($hero->getHp() > 0 && $monster->getHpoint() > 0) { // cette ligne dis que tant que le heros est toujours en vie et le monstre le combat continue
            $monsterHitMsg = "<p class='bg-secondary'>" . $monster->getName() . " frappe " . $hero->getName() . " et lui inflige " . $monster->hit($hero) . " dégâts </p>";

            $heroHitMsg = "<p class='bg-success'>" . $hero->getName() . " frappe " . $monster->getName() . "  et lui inflige " . $hero->hit($monster) . " dégâts </p>";
        
    
        }

        $fight[] = $monsterHitMsg;
        $fight[] = $heroHitMsg;
        return $fight;

        if($hero->getHp() <= 0) {
            $heroDeath = "<p>" . $hero->getName() . "est mort </p>"; 
            $fight[] = $heroDeath;
         } else if ($monster->getHpoint() <=0)
          $monsterDeath = "<p>" . $monster->getName() . " est vaincu </p>";
          $fight[]= $monsterDeath;
        }
    
    
 }  

