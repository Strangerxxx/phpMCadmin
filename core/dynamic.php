<?php
include('JSONAPI.php');
include('config.php');
$obj = new JSONAPI(HOST, PORT, UNAME, PWORD, SALT);
include('functions.php');

function showPlugins() {
global $plugins;
foreach($plugins as $plugin) {
echo "<tr>"
	."<td bgcolor=\"#e0e0e0\">".$plugin[name]."</td>"
	."<td bgcolor=\"#e0e0e0\">".$plugin[version]."</td>"
	."<td bgcolor=\"#e0e0e0\">";
echo ($plugin[enabled]) ? "<a title=\"Выключить ".$plugin[name]."\" href=\"?disable=".$plugin[name]."\">Включен</a>" : "<a title=\"Включить ".$plugin[name]."\" href=\"?enable=".$plugin[name]."\">Выключен</a>" ;
echo "</td></tr>";
}
}

function showUsers() {
global $players, $players_online;
foreach($players as $player) {
	 switch($player[world]) {
	 case 0: $world = "Игровой мир";
			 break;
	 case 1: $world = "Нижний мир";
			 break;
	 case 2: $world = "Небесный мир";
			 break;
	 }
echo "<tr>"
	."<td bgcolor=\"#e0e0e0\">".$player[name]."</td>"
	."<td bgcolor=\"#e0e0e0\">".$player[ip]."</td>"
	."<td bgcolor=\"#e0e0e0\">".$player[health]."</td>"
	."<td bgcolor=\"#e0e0e0\">".$world."</td>"
	."<td bgcolor=\"#e0e0e0\">";
echo ($player[op]) ? "<a title=\"Отобрать права оператора у ".$player[name]."\" href=\"#\" onclick=\"deopPlayer('".$player[name]."'); return false;\">Оператор</a>" : "<a title=\"Дать права оператора игроку ".$player[name]."\" href=\"#\" onclick=\"opPlayer('".$player[name]."'); return false;\">Игрок</a>" ;
echo "</td></tr>";
}
}

switch($_GET[get]){
	case "plugins": showPlugins();
					break;
	case "users":	showUsers();
					break;
}
if($_POST[item]) giveItem();
opPlayer();