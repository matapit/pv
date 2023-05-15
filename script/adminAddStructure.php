<?php

logged();

isAdmin();
$bdd= connect();
$req = $bdd->prepare('SELECT * FROM structures ORDER BY id DESC LIMIT 10');
$req->execute();

include('assets/adminAddStructure.php');
