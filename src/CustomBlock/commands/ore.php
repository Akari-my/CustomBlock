<?php

namespace CustomBlock\commands;

use CustomBlock\gui\GuiOre;
use CustomBlock\Loader;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class ore extends Command{

    protected Loader $plugin;

    public function __construct(Loader $plugin){
        $this->plugin = $plugin;
        parent::__construct("ore", "Ore Command");
        $this->setPermission("skywarsplus.ore.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if (!$sender instanceof Player){
            $sender->sendMessage(Loader::$prefix . "Questo comando può essere eseguito solo in gioco");
        } else {
            GuiOre::gui($sender);
        }
        return true;
    }
}