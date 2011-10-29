function showPlugins()   
	{
		$.ajax({
			url: "dynamic.php?get=plugins",
			cache: false,
			success: function(html){
									$("#plugins").html(html);   
									}
				});   
	}
function showUsers()   
	{
		$.ajax({
			url: "dynamic.php?get=users",
			cache: false,
			success: function(html){
									$("#users").html(html);   
									}
				});   
	}

$(document).ready(function(){   
		showPlugins();
		showUsers();
		setInterval('showPlugins();',5000);
		setInterval('showUsers();',1000);
	});

function giveItem() {
  var str = $("#ItemForm").serialize();
  $.post("dynamic.php", str, function(data) {
    $("#GiveResult").html(data);
  });
}
function opPlayer(user) {
  $.post("dynamic.php", {op: user}, function(data) {
    $("#GiveResult").html(data);
  });
}
function deopPlayer(user) {
  $.post("dynamic.php", {deop: user}, function(data) {
    $("#GiveResult").html(data);
  });
}