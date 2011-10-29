<?php
$info = $obj -> callMultiple(array('getServerVersion', 'getPlugins', 'getPlayerCount', 'getPlayerLimit', 'getPlayers'),array('', '', '', '', ''));
$version = $info[success][0][success];
$plugins = $info[success][1][success];
$players_online = $info[success][2][success];
$players_limit = $info[success][3][success];
$players = $info[success][4][success];

function items() {
$file = file(ITEMSFILE);
$items = array();
$i = 0;
foreach($file as $string) {
$string_e = explode(":", $string);
$items[$i][id] = $string_e[0];
$items[$i][name] = $string_e[1];
$i++;
}
$select = "
<select name=\"item\">
<option selected>ITEM</option>
";
foreach($items as $item) $select .= "<option value=\"".$item[id]."\">".$item[name]."</option>";
$select .=  "</select>";
return $select;
}

function players() {
global $players;
$select = "
<select name=\"player\">
<option selected>GAMER</option>
";
foreach($players as $player) $select .= "<option value=\"".$player[name]."\">".$player[name]."</option>";
$select .=  "</select>";
return $select;
}

function plugin() {
global $obj;
if(!empty($_REQUEST[disable])) echo ($obj -> call('disablePlugin', array($_REQUEST[disable]))) ? "Плагин успешно выключен" : "Ошибка!!!";
if(!empty($_REQUEST[enable])) echo ($obj -> call('enablePlugin', array($_REQUEST[enable]))) ? "Плагин успешно включен" : "Ошибка!!!";
}

function giveItem() {
global $obj;
if(!empty($_REQUEST[player]) && !empty($_REQUEST[item]) && !empty($_REQUEST[num]))
echo ($obj -> call('givePlayerItem', array($_REQUEST[player], $_REQUEST[item], $_REQUEST[num]))) ? "Игроку ".$_REQUEST[player]." успешно дан предмет #".$_REQUEST[item]."*".$_REQUEST[num] : "Ошибка, возможно игрока нет на сервере!!!";
}
function opPlayer() {
global $obj;
if(!empty($_REQUEST[deop])) echo ($obj -> call('deopPlayer', array($_REQUEST[deop]))) ? "У пользователя ".$_REQUEST[deop]." успешно отобраны права оператора" : "Ошибка!!!";
if(!empty($_REQUEST[op])) echo ($obj -> call('opPlayer', array($_REQUEST[op]))) ? "Пользователь ".$_REQUEST[op]." успешно получил права оператора" : "Ошибка!!!";
}