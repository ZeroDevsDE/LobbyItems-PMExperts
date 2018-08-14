<?php

namespace PMExpert;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Color;

class LobbyItems extends PluginBase implements Listener {
	public $prefix = Color::GRAY . "» " . Color::RED . Color::BOLD . "LobbyItems". Color::RESET . Color::GRAY . " » ";
	}