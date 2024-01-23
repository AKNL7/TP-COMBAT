<?php 

class Hero {
   
   private int $id; 
   private string $name; 
   private int $health_point; 


public function __construct($data){
    $this->name = $data['name'];
    // $this->id = $data['id'];
    // $this->health_point = $data($_POST['health_point']);
}

public function hit() {}

public function setName($name) {
    $this->name = $name;
}

public function getName() {
    return $this->name;
}

public function setId($id) {
    $this->id = $id;
}

public function getId() {
    return $this->id; 
}

public function setHealthPoint($health_point) {
    $this->health_point = $health_point; 

}

public function getHealthPoint(){
    return $this->health_point;
}
}

