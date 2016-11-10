<?php
   session_start();
   
   session_destroy();//destroy all variables
   unset($_COOKIE['log_user']);//unset the user 
   header("location: ../test2/Login.php");//redirects to the main page
	 
?>