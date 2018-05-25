<?php
//Model user
include_once('C:\xampp\htdocs\CrudWithAjax\Models\ModelUser.php');
$modeluser = new ModelUser();
if (isset($_GET["action"])){

	if ($_GET["action"]=="showusers"){

		echo $modeluser->ShowUsers();
	}else if ($_GET["action"]=="showuser"){
		echo $modeluser->SearchUserById($_POST["Id"]);
	} else if ($_GET["action"]=="deleteuser"){
		echo $modeluser->DeleteUser($_POST["Id"]);
	}else if ($_GET["action"]=="searchbyusername"){
		echo $modeluser->SearchByUsername($_POST["Username"]);
	}else if ($_GET["action"]=="adduser"){
		echo $modeluser->AddUser($_POST["Name"],$_POST["Username"],$_POST["Password"]);
	}else if ($_GET["action"]=="updateuser"){
		echo $modeluser->UpdateUser($_POST["Id"],$_POST["Name"],$_POST["Username"],$_POST["Password"]);
	}

}else 
//controller login
include_once('C:\xampp\htdocs\CrudWithAjax\GUI\views\ViewUser.php');