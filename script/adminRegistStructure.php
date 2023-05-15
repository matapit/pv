<?php


logged();

isAdmin();

$bdd= connect();






$req1 = $bdd->prepare('SELECT id FROM structures WHERE name =? ');
$req1->execute(array($_POST['name']));
$id = $req1->fetch();

if ($id == false) {
   
   
    if (isset($_POST['name'] ,$_POST['description']) AND !is_null($_POST['description'])) {
    $req = $bdd->prepare('INSERT INTO `structures` ( `name`, `description`, `admin_id`, `created_at`, `updated_at`) VALUES ( :name, :description, :admin_id, :create_at, :updated_at)');
							
		$req->execute(array(

							
							
                            'name' => $_POST['name'],
                            'description' => $_POST['description'],
                            'admin_id' => $_SESSION['id_user'],
                            'create_at' => date("Y-m-d  H:i:s"),
                             'updated_at' => date("Y-m-d  H:i:s")	
						));

       
                    }

                }
                    header('location:index.php?page=adminAddStructure');
                