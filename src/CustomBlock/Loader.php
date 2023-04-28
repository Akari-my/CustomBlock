<?php

namespace CustomBlock;

use CustomBlock\commands\ore;
use CustomBlock\event\Dimaond;
use CustomBlock\event\Emerald;
use CustomBlock\event\Gold;
use CustomBlock\event\Iron;
use muqsit\invmenu\InvMenuHandler;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat as TF;

class Loader extends PluginBase {

    public static $prefix = "§8[§cCustom§bBlock§8] §f> ";

    public function onEnable() : void {
        if(!InvMenuHandler::isRegistered()){
            InvMenuHandler::register($this);
        }

        $this->getLogger()->info(TF::RED . "==========( CUSTOMBLOCK )=========");
        $this->getLogger()->info(TF::GRAY . "» Version: " . $this->getDescription()->getVersion());
        $this->getLogger()->info(TF::GRAY . "» Author: Akari_my");
        $this->getLogger()->info(TF::GRAY . "» Support: https://discord.gg/hcQCmsvE");
        $this->getLogger()->info(TF::RED . "==========( CUSTOMBLOCK )=========");

        $this->registerEvents();
        $this->registerCommands();

        $this->saveResource("message.yml");
        $this->saveResource("inventory.yml");
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
