<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=combat', 'root', '');
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}