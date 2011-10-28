<?php
include('JSONAPI.php');
include('config.php');
$obj = new JSONAPI(HOST, PORT, UNAME, PWORD, SALT);
include('functions.php');

function showPlugins() {
global $plugins;
echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\">"
	."<tr>
	 <td bgcolor=\"#c0c0c0\">Имя плагина</td>
	 <td bgcolor=\"#c0c0c0\">Версия плагина</td>
	 <td bgcolor=\"#c0c0c0\">Состояние</td>
	 </tr>";
foreach($plugins as $plugin) {
echo "<tr>"
	."<td bgcolor=\"#e0e0e0\">".$plugin[name]."</td>"
	."<td bgcolor=\"#e0e0e0\">".$plugin[version]."</td>"
	."<td bgcolor=\"#e0e0e0\">";
echo ($plugin[enabled]) ? "<a title=\"Выключить ".$plugin[name]."\" href=\"?disable=".$plugin[name]."\">Включен</a>" : "<a title=\"Включить ".$plugin[name]."\" href=\"?enable=".$plugin[name]."\">Выключен</a>" ;
echo "</td></tr>";
}
echo "</table>";
}

function showUsers() {
global $players, $players_online;
if ($players_online != 0)
echo "<table cellpadding=\"0\" cellspacing=\"1\" border=\"0\">"
	."<tr>
	 <td bgcolor=\"#c0c0c0\">Игрок</td>
	 <td bgcolor=\"#c0c0c0\">IP</td>
	 <td bgcolor=\"#c0c0c0\">Жизни</td>
	 <td bgcolor=\"#c0c0c0\">Мир</td>
	 <td bgcolor=\"#c0c0c0\">Права</td>
	 </tr>";
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
echo ($player[op]) ? "<a title=\"Отобрать права оператора у ".$player[name]."\" href=\"?deop=".$player[name]."\">Оператор</a>" : "<a title=\"Дать права оператора игроку ".$player[name]."\" href=\"?op=".$player[name]."\">Игрок</a>" ;
echo "</td></tr>";
echo "</table>";
}
}

switch($_GET[get]){
	case "plugins": showPlugins();
					break;
	case "users":	showUsers();
					break;
}
if($_POST[item]) giveItem();