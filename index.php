<?php
include_once('partials/header.php');
require_once('./config/db.php');
require_once('./config/autoload.php');



$heroesManager = new heroesManager($db);

if (isset($_POST['hero_name']) && !empty($_POST['hero_name'])) {


    $heros = new Hero([
        'name' => $_POST['hero_name']
    ]);
    // $heros->setName($_POST['hero_name']);
    $heroesManager->add($heros);
   
}
$heroesManager->findAllAlive();


?>



<form action="" method="post">
    <div class="mb-3 mt-4 p-4">
        <label for="name" class="form-label">Nom de votre héros : </label>
        <input type="text" class="form-control" id="hero_name" name="hero_name" aria-describedby="hero_name">
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </div>


</form>





<div class="card" style="width: 15rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Card title</h5>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Nom</li>
        <li class="list-group-item">A second item</li>
       
    </ul>
</div>






<?php
include_once('partials/footer.php');
?>