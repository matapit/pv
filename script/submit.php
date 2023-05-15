<?php

if (isset($_POST['login']) AND isset($_POST['mot_de_passe']))
{
   
    // creation de session  pseudo et mot de passe
	$_SESSION['email'] = "";
	$_SESSION['id_user'] = "";
    $_SESSION['user'] = "";
    $_SESSION['role'] = "";
    $_SESSION['admin_id'] = "";

    $bdd = connect();


	$req = $bdd->prepare('SELECT * FROM users WHERE email =? AND password = ?');
    $req->execute(array($_POST['login'], $_POST['mot_de_passe']));
    
	while ($donnees = $req->fetch())
	{
       
        $_SESSION['email'] = $donnees['email'];
        $_SESSION['id_user'] = $donnees['id'];
        $_SESSION['password'] = $donnees['password'];
        $_SESSION['user'] = $donnees;

	}
        $req->closeCursor();
       
	if ($_SESSION['email']==$_POST['login'] AND $_SESSION['password']==$_POST['mot_de_passe'] )
	{
     
		$req1 = $bdd->prepare('SELECT id FROM admins WHERE user_id =? ');
        $req1->execute(array($_SESSION['id_user']));
        $id = $req1->fetch();
        if ($id != false) {
            
            $_SESSION['role'] = 'admin';
            $_SESSION['admin_id'] = $id['id'];
           header('location:index.php?page=adminHome');


           
        }else {
            $req1 = $bdd->prepare('SELECT id FROM comptables WHERE user_id =? ');
        $req1->execute(array($_SESSION['id_user']));
        $id = $req1->fetch();
        if ($id != false) {
           
            $_SESSION['role'] ='comptable';
            
            echo 'ok';
           header('location:index.php?page=userHome');
        
        }else
        {
            header('location:index.php?page=index');
        }
        }

        

        
        
        
	}else
	{
        
		header('location:index.php?page=index');
	}
}



