<?php

require_once './config/db.php';
require_once './class/heroesManager.php';
require_once './class/hero.php';


$heroesManager = new heroesManager($db);
if (isset($_POST['name']) && !empty($_POST['name'])) {

    $heros = new Hero($_POST);

    $heros->getName();

    $heroesManager->add($heros);
    
 
   
}

$heroesAlive = $heroesManager->findAllAlive();
// var_dump($heroesAlive)

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>


    <form class="form -style-4" action="" method="post">
        <label for="field1">
            <span class="enter">Enter Your Name</span><input type="text" name="name" />
        </label>

        <label>
            <span></span><input type="submit" value="Choose" />
        </label>
    </form>


    <div class="card">
        <div class="container">
            <div class="hero_card">
                <?php foreach($heroesAlive as $heroAlive){ ?>
                    <img src="./img/kisspng-costume-party-clothing-halloween-costume-adult-cock-5abb7554cf07a9.521466961522234708848.png" alt="Avatar" style="width:50px">
            <h4><b><?= $heroAlive ->getName()?></b></h4>
            <p><?= $heroAlive -> getHealthPoint() ?></p>

       <?php } ?>
    </div>
  </div>
</div>


</body>

</html>

