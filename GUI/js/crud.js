LoadUsers();

function LoadUsers(){

	$.getJSON("../Data/Controllers/ControllerUser.php?action=showusers",function(json){
		var tr = $(".users");
		tr.html("");
		$.each(json,function(index,value){
			tr.append("<tr>");
			tr.append("<td>"+value.Id+"</td> <td>"+value.Name+"</td>  <td>"+value.Username+"</td> <td>"+value.Password+"</td>  <td><button class='btndelete' id="+value.Id+">Delete</button></td>    <td><button class='btnupdate' id="+value.Id+">Update</button></td>");
			tr.append("</tr>");
		})


	})

}
$(document).on("click",".btnupdate",function(){
	var id = $(this).attr("id");
	$.post("../Data/Controllers/ControllerUser.php?action=showuser",{Id:id},function(json){

		var userjson = JSON.parse(json);
		$("[name='Id']").val(userjson.Id);
		$("[name='Name']").val(userjson.Name);
		$("[name='Username']").val(userjson.Username);
		$("[name='Password']").val(userjson.Password);

	
	})
})
$(document).on("click",".btndelete",function(){
	var id = $(this).attr("id");
	var pregunta = "are youu sure ?";

	if (pregunta== true ){
		$.post("../Data/Controllers/ControllerUser.php?action=deleteuser",{Id:id},function(json){
			LoadUsers();
		})	
	}
})
function SearchByUsername(){
	 var search = $("[name='Search']").val();
	 $.post("../Data/Controllers/ControllerUser.php?action=searchbyusername",{Username:search},function(json){

	 	var userjson = JSON.parse(json);
     if (userjson.length> 0){

	 		var tr = $(".users");
		tr.html("");
		$.each(userjson,function(index,value){
			tr.append("<tr>");
			tr.append("<td>"+value.Id+"</td> <td>"+value.Name+"</td>  <td>"+value.Username+"</td> <td>"+value.Password+"</td>  <td><button class='btndelete' id="+value.Id+">Delete</button></td>    <td><button class='btnupdate' id="+value.Id+">Update</button></td>");
			tr.append("</tr>");
		})


	 	}else if (userjson.Username != search.val()){
	 		tr.html("");
	 		tr.append("<tr>");
	 		tr.html("<td>The username is incorrect</td>");
	 		tr.append("</tr>");
	 	}
	 	else 
	 	{
	 		LoadUsers();
	 	}
	 })
}

function AddUser(){
	var name = $("[name='Name']").val();
	var username= $("[name='Username']").val();
	var password = $("[name='Password']").val();
	$.post("../Data/Controllers/ControllerUser.php?action=adduser",{Name:name,Username:username,Password:password},function(json){
		var userjson = JSON.parse(json);
		alert(userjson.message);
		LoadUsers();
	
	})
}
function UpdateUser(){
	var id =$("[name='Id']").val();
	var name = $("[name='Name']").val();
	var username= $("[name='Username']").val();
	var password = $("[name='Password']").val();

	$.post("../Data/Controllers/ControllerUser.php?action=updateuser",{Id:id,Name:name,Username:username,Password:password},function(json){
		var userjson = JSON.parse(json);
		alert(userjson.message);
		LoadUsers();
		
	})
}