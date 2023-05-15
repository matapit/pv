<?php

logged();

isAdmin();
$bdd= connect();
$req = $bdd->prepare('SELECT * FROM records ORDER BY id DESC LIMIT 10');
$req->execute();

include 'assets\adminHome.php';
?>
