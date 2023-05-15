<?php 

	if (!isset($_GET['page']) || $_GET['page']=='index' || $_GET['page']==''){

		include 'script\index.php';

	}
	else{
	
		if (is_file('script\\'.$_GET['page'].'.php')) {
			
			
			include 'script\\'.$_GET['page'].'.php';
		}else{

			include 'assets\404.php';


		}


	}



	











 ?>