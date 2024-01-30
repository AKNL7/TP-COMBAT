<?php
include_once('partials/header.php');
require_once('./config/db.php');
require_once('./config/autoload.php');

$heroManager = new heroesManager($db);

if (isset($_POST['hero_id']) && !empty($_POST['hero_id'])) {
    $hero = $heroManager->find(intval($_POST['hero_id']));
    var_dump($hero);
    // die();
} else {
    header('Location:index.php');
}

$fightManager = new fightManager(); 
$monster = $fightManager->createMonster(); //comme on a retourner monster on le stock dans une variable monster

echo "<pre>" ; 
var_dump($hero); 
var_dump($monster);
echo "</pre>" ;

$fightResult = $fightManager->fight($hero, $monster);
$heroManager->update($hero);




include_once('partials/header.php')

?>

<?php foreach ($fightResult as $result) { ?>
    
    <p> <?php echo $result ?> </p>

<?php } ?>
