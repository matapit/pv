<?php


logged();

isAdmin();

$bdd= connect();


var_dump($_POST);



$req1 = $bdd->prepare('SELECT id FROM users WHERE name =? ');
$req1->execute(array($_POST['nom']));
$id = $req1->fetch();

if ($id['id'] == false) {
   
   
    if (isset($_POST['nom'] ,$_POST['mot_de_passe'], $_POST['email'], $_POST['admin']) AND !is_null($_POST['mot_de_passe']) AND !is_null($_POST['admin']) AND  !is_null($_POST['nom']) AND !is_null($_POST['email']) ) {
    $req = $bdd->prepare('INSERT INTO `users` ( `name`, `email`, `password`, `created_at`, `updated_at`) VALUES ( :name, :email, :password, :create_at, :updated_at)');
            
        
    


		$req->execute(array(

							
							
                            'name' => $_POST['nom'],
                            'email' => $_POST['email'],
                            'password' => $_POST['mot_de_passe'],
                            'create_at' => date("Y-m-d  H:i:s"),
                             'updated_at' => date("Y-m-d  H:i:s")	
						));

                    if ($_POST['admin'] == 'administrateur'){
                        $req1 = $bdd->prepare('INSERT INTO `admins` ( `user_id`, `created_at`, `updated_at`) VALUES ( :user_id, :create_at, :updated_at)');
            
        
                        


                        $req1->execute(array(
                
                                            
                                            
                                            'user_id' => $bdd->lastInsertId(),
                                            
                                            'create_at' => date("Y-m-d  H:i:s"),
                                             'updated_at' => date("Y-m-d  H:i:s")	
                                        ));
                    }else {
                        $req1 = $bdd->prepare('INSERT INTO `comptables` ( `user_id`, `created_at`, `updated_at`) VALUES ( :user_id, :create_at, :updated_at)');
            
        
                        echo 'ok';


                        $req1->execute(array(
                
                                            
                                            
                                            'user_id' => $bdd->lastInsertId(),
                                            
                                            'create_at' => date("Y-m-d  H:i:s"),
                                             'updated_at' => date("Y-m-d  H:i:s")	
                                        ));
                    }
                    }

                }
                    header('location:index.php?page=adminAddUser');
                