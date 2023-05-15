<?php

logged();


$bdd= connect();

logged();

$req1 = $bdd->prepare('SELECT * FROM structures ORDER BY id DESC LIMIT 10');
$req1->execute();







$requete='SELECT * FROM records ';
        if (isset($_POST['date_min'], $_POST['date_max'], $_POST['min'], $_POST['max'], $_POST['prix_min'], $_POST['prix_max'], $_POST['structure']) AND [$_POST['date_min'] ,$_POST['date_max'], $_POST['min'], $_POST['max'], $_POST['prix_min'], $_POST['prix_max'], $_POST['structure'] ] != ['','','','','','','']) {
          
          $requete.= 'WHERE (affectation BETWEEN \''.$_POST['date_min'].'\' AND \''.$_POST['date_max'].'\') AND (quantity BETWEEN '. $_POST['min'].' AND '. $_POST['max'].') AND (unit_price BETWEEN '.$_POST['prix_min'].' AND '. $_POST['prix_max'].') AND structure_id = '.$_POST['structure'] ;
          
        
          //echo $requete;

        }

        
        $filtre = (isset($_GET['filtre']) AND !empty($_GET['filtre'])) ? $_GET['filtre'] : 'id' ;
     
      $req = $bdd->prepare( $requete.' ORDER BY '.htmlspecialchars($filtre).' DESC');

          $req->execute();


          $contenu = "  code;n_dens;designation;description;espece des unités;quantité;prix unitaire;date d'affectation;structure\n";   
        $date = date("Y-m-d H-i-s");


include('assets/adminSelectPv.php');
