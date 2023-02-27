<?php

namespace CustomBlock;

use CustomBlock\commands\ore;
use CustomBlock\event\Dimaond;
use CustomBlock\event\Emerald;
use CustomBlock\event\Gold;
use CustomBlock\event\Iron;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase {

    public static $prefix = "§8[§cCustom§bBlock§8] §f> ";

    public function onEnable() : void {
        $this->getServer()->getLogger()->info("§8[§cCustom§bBlock§8]\n-> Developed By Akari and Chillato\n-> Version GUI\n-> Version UI https://github.com/Chillato/CustomBlock-PMMP\n§8[§cCustom§bBlock§8]");
        $this->registerEvents();
        $this->registerCommands();
    }
    
    public function registerEvents(){
        $register = $this->getServer()->getPluginManager();
        $register->registerEvents(new Dimaond(), $this);
        $register->registerEvents(new Emerald(), $this);
        $register->registerEvents(new Gold(), $this);
        $register->registerEvents(new Iron(), $this);
    }
    
    public function registerCommands(){
        $register = $this->getServer()->getCommandMap();
        $register->register("customblock", new ore($this));
    }
}