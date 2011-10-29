<?php
include('JSONAPI.php'); // include JSONAPI class file
include('config.php'); // include config file
$obj = new JSONAPI(HOST, PORT, UNAME, PWORD, SALT); // connect to server:
include('functions.php'); // include handlers for interface
include('header.php'); //include header
// interface:

//print handlers:
plugin();

echo "<br />";
echo "Версия сервера:".$version."<br /><br />";
echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\">"
	."<thead>
	 <tr>
	 <td bgcolor=\"#c0c0c0\">Имя плагина</td>
	 <td bgcolor=\"#c0c0c0\">Версия плагина</td>
	 <td bgcolor=\"#c0c0c0\">Состояние</td>
	 </tr>
	 </thead>"
	."<tbody id=\"plugins\"></tbody>"
	."</table>";

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
if ($players_online != 0)
echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\">"
	."
	 <thead>
	 <tr>
	 <td bgcolor=\"#c0c0c0\">Игрок</td>
	 <td bgcolor=\"#c0c0c0\">IP</td>
	 <td bgcolor=\"#c0c0c0\">Жизни</td>
	 <td bgcolor=\"#c0c0c0\">Мир</td>
	 <td bgcolor=\"#c0c0c0\">Права</td>
	 </tr>
	 </thead>
	 <tbody id=\"users\"></tbody>"
	."</table>";
