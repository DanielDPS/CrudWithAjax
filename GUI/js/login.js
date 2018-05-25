$(document).on("click",".access",function(){

	var username = $("[name='Username']").val();
	var password = $("[name='Password']").val();
	$.post("../Data/Controllers/ControllerLogin.php?action=login",{Username:username,Password:password},function(json){
		var userjson = JSON.parse(json);
		if (userjson.message=="Welcome"){
            
            alert(userjson.message);
			window.location.href="Users.php";

		}


	})
})
