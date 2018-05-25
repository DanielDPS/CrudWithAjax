<?php
//Model user
include_once('C:\xampp\htdocs\CrudWithAjax\Models\ModelUser.php');
$modeluser = new ModelUser();
if (isset($_GET["action"])){

	if ($_GET["action"]=="login"){

		echo $modeluser->Login($_POST["Username"],$_POST["Password"]);
			}

}else 
//controller login
include_once('C:\xampp\htdocs\CrudWithAjax\GUI\views\ViewLogin.php');