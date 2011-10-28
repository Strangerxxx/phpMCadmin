<?php
include('JSONAPI.php'); // include JSONAPI class file
include('config.php'); // include config file
$obj = new JSONAPI(HOST, PORT, UNAME, PWORD, SALT); // connect to server:
include('functions.php'); // include handlers for interface
include('header.php'); //include header
// interface:

//print handlers:
plugin();
opPlayer();

echo "<br />";
echo "Версия сервера:".$version."<br /><br />";
echo "<div id=\"plugins\"></div>";

echo "Игроков на сервере: ".$players_online."/".$players_limit."<br /><br />";
echo "
<form id=\"ItemForm\">
<table border=\"0\">
  <tr>
	<td>Игрок:</td>
    <td>Номер:</td>
    <td>Кол-во:</td>
  </tr>
  <tr>
	<td>".players()."</td>
    <td>".items()."</td>
    <td><input type=\"text\" size=\"5\" name=\"num\"></td>
	<td><input onclick=\"giveItem(); return false\" type=\"submit\" value=\"Дать!\"></td>
	<td id=\"GiveResult\"></td>
  </tr>
</table>
</form>
";
echo "<div id=\"users\"></div>";
