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


</body>

</html>

<?php

require_once './config/db.php';
require_once './class/heroesManager.php';
require_once './class/hero.php';


if (isset($_POST['name']) && !empty($_POST['name'])) {

    $heroesManager = new heroesManager($db);
    $heros = new Hero($_POST['name']);

    $heros->getName();

    $heroesManager->add($heros);

    $heros->setId($id);
    $heros->setHealthPoint(100);
}
?>