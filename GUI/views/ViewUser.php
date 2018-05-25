<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/crud.js"></script>

</head>
<body>




<h1>Welcome to my crud </h1><br>
<input type="text" name="Id" disabled><br>
<input type="text" name="Name" placeholder="Enter your name"><br>
<input type="text" name="Username" placeholder="Enter your username"><br>
<input type="password" name="Password" placeholder="Enter your password"><br>
<button onclick="AddUser();">Add</button> <button onclick="UpdateUser();">Update</button>
<br><br><br>

<h1>Search the user by Username or Name</h1>
<br>
<input style="width:40%;" type="text" name="Search" placeholder="Search by username or by name" onkeyup="SearchByUsername();">
<br><br>
<h1>All the users</h1>
<br>
<table>
	<thead>
		<th>ID</th>
		<th>NAME</th>
		<th>USERNAME</th>
		<th>PASSWORD</th>
		<th>DELETE</th>
		<th>UPDATE</th>
	</thead>
	<tbody class="users">
		
	</tbody>
</table>

</body>
</html>