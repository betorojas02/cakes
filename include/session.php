<?php 
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}

if(!isset($_SESSION['usuario'])){
	die('acceso denegado porfavor inicie sesion');
}//end isset
