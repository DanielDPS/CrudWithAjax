<?php
include_once('C:\xampp\htdocs\CrudWithAjax\Data\Database\dbcrud.php');
class ModelUser{

	private $query;
	private $array;
	private $row;
	private $result;
	private $db;

	public function __construct(){
		$this->array= array();
		$this->result["message"]="";
		$this->db=dbcrud::Connect();
	}

	public function Login($username,$password){

		$this->query = $this->db->prepare("CALL Login(:username,:password)");
		$this->query->execute(array(":username"=>$username,":password"=>$password));
		$this->row = $this->query->fetch(PDO::FETCH_ASSOC);

		if ($username =="" && $password ==""){
			$this->result["message"]="No data";
		}else if ($this->row["Username"]==$username && $this->row["Password"]==$password){
			$this->result["message"]="Welcome";
		}
		else 
		{
			$this->result["message"]="Not exist the username or password";
		}
		return json_encode($this->result);

	}

	public function ShowUsers(){
		$this->query = $this->db->query("CALL GetUsers()");
		foreach ($this->query->fetchAll() as $this->row){
			$this->array[] = $this->row;
		}
		return json_encode($this->array);
	}
	public function SearchUserById($id){
		$this->query = $this->db->prepare("CALL  SelectUserById(:id)");
		$this->query->execute(array(":id"=>$id));
		$this->row = $this->query->fetch(PDO::FETCH_ASSOC);
		return json_encode($this->row);

	}
	public function DeleteUser($id){
		$this->query = $this->db->prepare("CALL DeleteUser(:id)");
		$this->query->bindParam(":id",$id);
		$this->query->execute();
	}
	public function SearchByUsername($filter){
		$this->query =$this->db->prepare("CALL SearchByUsername(:filter)");
		if ($this->query->execute(array(":filter"=>$filter))){

			foreach($this->query->fetchAll() as $this->row){
				$this->array[] = $this->row;
			}
		}
		return json_encode($this->array);
	}

	public function AddUser($name,$username,$password){
		$this->query= $this->db->prepare("CALL InsertUser(:name,:username,:password)");
		if ($name== "" && $username=="" && $password ==""){

			$this->result["message"]="No data";

		}else if ($this->query->execute(array(":name"=>$name,":username"=>$username,":password"=>$password))){

			$this->result["message"]="It was inserted succesful";

		}else 
		{
			$this->result["message"]="There is a error ";
		}

		return json_encode($this->result);

	}

	public function UpdateUser($id,$name,$username,$password)
	{
		$this->query= $this->db->prepare("CALL UpdateUser(:id,:name,:username,:password)");
		if ($this->query->execute(array(":id"=>$id,":name"=>$name,":username"=>$username,":password"=>$password))){

			$this->result["message"]="It was updated succesful";

		}else {

			$this->result["message"]="There is a error in your data";

		}
		return json_encode($this->result);
	}
}