<?php

namespace PMExpert;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat as Color;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class LobbyItems extends PluginBase implements Listener {
	public $prefix = Color::GRAY . "» " . Color::RED . Color::BOLD . "LobbyItems". Color::RESET . Color::GRAY . " » ";
	
	public function onEnable() {
		$this->getLogger->info($this->prefix . "\nAddon geladen");
		$this->config = $this->getConfig();
		$this->config = new Config($this->getDataFolder()."settings.yml", Config::YAML, [
		  "IP" => "127.0.0.1",
		  "Port" => 19132,
		"##You can switch between UI or Hotbar",
		  "Compass" => UI,
		]);
		if($this->config->get("Compass") === UI){
			$this->config = new Config($this->getDataFolder()."compass.yml", Config::YAML, [
			"item0" => 0,
			"x" => '',
			"y" => '',
			"z" => '',
			"item1" => 0,
			"x" => '',
			"y" => '',
			"z" => '',
			"item2" => 0,
			"x" => '',
			"y" => '';
			"z" => '',
		    
			]);
			} else if($this->config->get("Compass") === Hotbar) {
				
				}
		}
		
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
    	$this->config = $this->getConfig();
        $this->config = new Config($this->getDataFolder() . "settings.yml", Config::YAML);
    	if($command->getName === "hub"){
    	$ip = $this->config->get("IP");
        $port = $this->config->get("Port");
        $sender->transfer($ip, $port);
    }
    if($command->getName === "lobby"){
    $ip = $this->config->get("IP");
    $port = $this->config->get("Port");
    $sender->transfer($ip, $port);
    }
    }
	}