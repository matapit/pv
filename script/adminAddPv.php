<?php

logged();

isAdmin();
$bdd= connect();
$req1 = $bdd->prepare('SELECT * FROM structures ORDER BY id DESC LIMIT 10');
$req1->execute();


$req = $bdd->prepare('SELECT * FROM records ORDER BY id DESC LIMIT 10');
$req->execute();


include('assets/adminAddPv.php');