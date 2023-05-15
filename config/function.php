<?php
 session_start();
function isAdmin()
{
    if (isset($_SESSION['role'])) {
    
    if ($_SESSION['role'] != 'admin') {
        header('location:index.php');
    }
       
    }
}
function isComptable()
{
    if ($_SESSION['role'] != 'comptable') {
        header('location:index.php');
    }
}
function isconnect()
{
   
	if (isset($_SESSION['email'], $_SESSION['email'] ) AND $_SESSION['email'] != "" AND $_SESSION['password'] != "" ) 
	{
		return true;
	}else {
        return false;
    }
    
}
function logged()
{
	if (!isconnect()) {	
		header('location:index.php');
	}
}
function getAdmin($id)
{
    # code...
}
