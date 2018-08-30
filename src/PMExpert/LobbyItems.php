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
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\item\Item;
use pocketmine\level\Position;

class LobbyItems extends PluginBase implements Listener {
	public $prefix = Color::GRAY . "» " . Color::RED . Color::BOLD . "LobbyItems". Color::RESET . Color::GRAY . " » ";
	
	public function onEnable() {
		$this->saveResource("compass.yml");
		$this->saveResource("settings.yml");
		$this->getLogger()->info("\n" . $this->prefix . "Addon geladen");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$settings = new Config($this->getDataFolder()."settings.yml", Config::YAML, [
		  "IP" => "91.200.100.50",
		  "Port" => 19132,
		]);
		$compass = new Config($this->getDataFolder()."compass.yml", Config::YAML, [
		  "item0" => 0,
			"name0" => "Test",
			"x0" => 0,
			"y0" => 0,
			"z0" => 0,
			"item1" => 0,
			"name1" => "Test",
			"x1" => 0,
			"y1" => 0,
			"z1" => 0,
			"item2" => 0,
			"name2" => "Test",
			"x2" => 0,
			"y2" => 0,
			"z2" => 0,
			"item3" => 0,
			"name3" => "Test",
			"x3" => 0,
			"y3" => 0,
			"z3" => 0,
			"item4" => 0,
			"name4" => "Test",
			"x4" => 0,
			"y4" => 0,
			"z4" => 0,
			"item5" => 0,
			"name5" => "Test",
			"x5" => 0,
			"y5" => 0,
			"z5" => 0,
			"item6" => 0,
			"name6" => "Test",
			"x6" => 0,
			"y6" => 0,
			"z6" => 0,
			"item7" => 0,
			"name7" => "Test",
			"x7" => 0,
			"y7" => 0,
			"z7" => 0,
			]);
		}
		
    public function onCommand(CommandSender $sender, Command $command, string $label, array $args): bool{
        $settings = new Config($this->getDataFolder() . "settings.yml", Config::YAML);
    	if($command->getName() === "hub"){
    	$ip = $settings->get("IP");
        $port = $settings->get("Port");
        $sender->transfer($ip, $port);
    }
    if($command->getName() === "lobby"){
    $ip = $settings->get("IP");
    $port = $settings->get("Port");
    $sender->transfer($ip, $port);
    }
    return false;
    }
    public function games(Player $player){
    $compass = new Config($this->getDataFolder()."compass.yml", Config::YAML);
    $player->getInventory()->clearAll();
    $item0 = Item::get($compass->get("item0"));
    $item0->setCustomName($compass->get("name0"));
    $player->getInventory()->setItem(0, $item0);
    $item1 = Item::get($compass->get("item1"));
    $item1->setCustomName($compass->get("name1"));
    $player->getInventory()->setItem(1, $item1);
    $item2 = Item::get($compass->get("item2"));
    $item2->setCustomName($compass->get("name2"));
    $player->getInventory()->setItem(2, $item2);
    $item3 = Item::get($compass->get("item3"));
    $item3->setCustomName($compass->get("name3"));
    $player->getInventory()->setItem(3, $item3);
    $item4 = Item::get($compass->get("item4"));
    $item4->setCustomName($compass->get("name4"));
    $player->getInventory()->setItem(4, $item4);
    $item5 = Item::get($compass->get("item5"));
    $item5->setCustomName($compass->get("name5"));
    $player->getInventory()->setItem(5, $item5);
    $item6 = Item::get($compass->get("item6"));
    $item6->setCustomName($compass->get("name6"));
    $player->getInventory()->setItem(6, $item6);
    $item7 = Item::get($compass->get("item7"));
    $item7->setCustomName($compass->get("name7"));
    $player->getInventory()->setItem(7, $item7);
    $back = Item::get(372);
    $back->setCustomName(Color::GRAY . "[" . Color::DARK_RED . "Back" . Color::GRAY . "]");
    $player->getInventory()->setItem(8, $back);
    
    }
    
    public function mainItems(Player $player) {
    $player->getInventory()->clearAll();
    $compass = Item::get(345, 0, 1);
    $compass->setCustomName(Color::GRAY . "[" . Color::GREEN . "Compass" . Color::GRAY . "]");
    $player->getInventory()->setItem(0, $compass);
    }
    
    public function onJoin(PlayerJoinEvent $event) {
    	$player = $event->getPlayer();
        $player->getInventory()->clearAll();
    	$this->mainItems($player);
    }
    
    public function onRespawn(PlayerRespawnEvent $event) {
    	$player = $event->getPlayer();
        $this->mainItems($player);
    }
	
	public function onInteract(PlayerInteractEvent $event) {
        $compass = new Config($this->getDataFolder()."compass.yml", Config::YAML);
		$player = $event->getPlayer();
		$item = $player->getInventory()->getItemInHand();
		if($item->getCustomName() === Color::GRAY . "[" . Color::GREEN . "Compass" . Color::GRAY . "]") {
			$this->games($player);
		} else if($item->getCustomName() === Color::GRAY . "[" . Color::DARK_RED . "Back" . Color::GRAY . "]") {
			$this->mainItems($player);
		} else if($item->getCustomName() === $compass->get("name0")) {
			$x0 = $compass->get("x0");
			$y0 = $compass->get("y0");
			$z0 = $compass->get("z0");
			$level = $player->getLevel();
			$player->teleport(new Position($x0, $y0, $z0, $level));
		} else if($item->getCustomName() === $compass->get("name1")) {
			$x1 = $compass->get("x1");
			$y1 = $compass->get("y1");
			$z1 = $compass->get("z1");
			$level = $player->getLevel();
			$player->teleport(new Position($x1, $y1, $z1, $level));
		} else if($item->getCustomName() === $compass->get("name2")) {
			$x2 = $compass->get("x2");
			$y2 = $compass->get("y2");
			$z2 = $compass->get("z2");
			$level = $player->getLevel();
			$player->teleport(new Position($x2, $y2, $z2, $level));
	   } else if($item->getCustomName() === $compass->get("name3")) {
			$x3 = $compass->get("x3");
			$y3 = $compass->get("y3");
			$z3 = $compass->get("z3");
			$level = $player->getLevel();
			$player->teleport(new Position($x3, $y3, $z3, $level));
	   } else if($item->getCustomName() === $compass->get("name4")) {
			$x4 = $compass->get("x4");
			$y4 = $compass->get("y4");
			$z4 = $compass->get("z4");
			$level = $player->getLevel();
			$player->teleport(new Position($x4, $y4, $z4, $level));
	   } else if($item->getCustomName() === $compass->get("name5")) {
			$x5 = $compass->get("x5");
			$y5 = $compass->get("y5");
			$z5 = $compass->get("z5");
			$level = $player->getLevel();
			$player->teleport(new Position($x5, $y5, $z5, $level));
	   } else if($item->getCustomName() === $compass->get("name6")) {
			$x6 = $compass->get("x6");
			$y6 = $compass->get("y6");
			$z6 = $compass->get("z6");
			$level = $player->getLevel();
			$player->teleport(new Position($x6, $y6, $z6, $level));
	   } else if($item->getCustomName() === $compass->get("name7")) {
			$x7 = $compass->get("x7");
			$y7 = $compass->get("y7");
			$z7 = $compass->get("z7");
			$level = $player->getLevel();
			$player->teleport(new Position($x7, $y7, $z7, $level));
	   }
		
		}
		}