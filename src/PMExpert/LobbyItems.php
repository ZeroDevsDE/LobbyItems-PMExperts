<?php

namespace PMExpert;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Color;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\item\Item;

class LobbyItems extends PluginBase implements Listener {
	public $prefix = Color::GRAY . "» " . Color::RED . Color::BOLD . "LobbyItems". Color::RESET . Color::GRAY . " » ";
	
	public function onEnable() {
		$this->getLogger()->info($this->prefix . "\nAddon geladen");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->config = $this->getConfig();
		$this->config = new Config($this->getDataFolder()."settings.yml", Config::YAML, [
		  "IP" => "91.200.100.50",
		  "Port" => 19132,
		]);
			$this->config = new Config($this->getDataFolder()."compass.yml", Config::YAML, [
			"item0" => 0,
			"x0" => 0,
			"y0" => 0,
			"z0" => 0,
			"item1" => 0,
			"x1" => 0,
			"y1" => 0,
			"z1" => 0,
			"item2" => 0,
			"x2" => 0,
			"y2" => 0,
			"z2" => 0,
			"item3" => 0,
			"x3" => 0,
			"y3" => 0,
			"z3" => 0,
			"item4" => 0,
			"x4" => 0,
			"y4" => 0,
			"z4" => 0,
			"item5" => 0,
			"x5" => 0,
			"y5" => 0,
			"z5" => 0,
			"item6" => 0,
			"x6" => 0,
			"y6" => 0,
			"z6" => 0,
			"item7" => 0,
			"x7" => 0,
			"y7" => 0,
			"z7" => 0,
			"item8" => 0,
			"x8" => 0,
			"y8" => 0,
			"z8" => 0,
			]);
		}
		
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
    	$this->config = $this->getConfig();
        $this->config = new Config($this->getDataFolder() . "settings.yml", Config::YAML);
    	if($command->getName() === "hub"){
    	$ip = $this->config->get("IP");
        $port = $this->config->get("Port");
        $sender->transfer($ip, $port);
    }
    if($command->getName() === "lobby"){
    $ip = $this->config->get("IP");
    $port = $this->config->get("Port");
    $sender->transfer($ip, $port);
    }
    return false;
    }
    
    public function mainItems(Player $player) {
    $compass = Item::get(345, 0, 1);
    $compass->setCustomName(Color::GRAY . "[" . Color::GREEN . "Compass" . Color::GRAY . "]");
    $player->getInventory()->setItem(0, $compass);
    }
    
    public function onJoin(PlayerJoinEvent $event) {
    	$player = $event->getPlayer();
    	$this->mainItems($player);
    }
	}