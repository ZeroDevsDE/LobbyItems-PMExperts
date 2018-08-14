<?php

namespace PMExpert;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Color;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;

class LobbyItems extends PluginBase implements Listener {
	public $prefix = Color::GRAY . "» " . Color::RED . Color::BOLD . "LobbyItems". Color::RESET . Color::GRAY . " » ";
	
	public function onEnable() {
		$this->getLogger()->info($this->prefix . "\nAddon geladen");
		$this->config = $this->getConfig();
		$this->config = new Config($this->getDataFolder()."settings.yml", Config::YAML, [
		  "IP" => "91.200.100.50",
		  "Port" => 19132,
		  "Compass" => "UI",
		]);
		if($this->config->get("Compass") === "UI"){
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
			]);
			} else if($this->config->get("Compass") === "Hotbar") {
				
				}
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
	}