<?php
logged();
isAdmin();
$bdd= connect();


$req1 = $bdd->prepare('SELECT id FROM records WHERE codes =? ');
$req1->execute(array($_POST['code']));
$id = $req1->fetch();
if ($id == false) {

if (isset($_POST['code'] ,$_POST['n_dens'] ,$_POST['designation'] ,$_POST['espece_des_unites'] ,$_POST['quantite'] ,$_POST['prix'] , $_POST['date'], $_POST['structure'], $_POST['description']) AND !is_null($_POST['n_dens']) AND !is_null($_POST['code'])) {
   
    echo 'ok';

    $req = $bdd->prepare('INSERT INTO records( `created_at`, `updated_at`, `codes`, `n_dens`, `designation`, `description`, `unite`, `quantity`, `unit_price`, `affectation`, `structure_id`, `admin_id`) VALUES( :created_at, :updated_at, :codes, :n_dens, :designation,:description,:espece_des_unites, :quantite, :prix_unitaire, :date_affectation, :structure, :admin_id)');
							
    $req->execute(array(

                        'created_at' => date("Y-m-d  H:i:s"),
                        'updated_at' => date("Y-m-d  H:i:s"),
                        'codes' => $_POST['code'],
                        'n_dens' => $_POST['n_dens'],
                        'designation' => $_POST['designation'],
                        'description' => $_POST['description'],
                        'espece_des_unites' => $_POST['espece_des_unites'],
                        'quantite'=> $_POST['quantite'],
                        'prix_unitaire'=>$_POST['prix'],
                        'date_affectation' => $_POST['date'],
                        'structure' => $_POST['structure'],
                        'admin_id' => $_SESSION['admin_id']



                        
                    ));


}
}

header('location:index.php?page=adminAddPv')  ;