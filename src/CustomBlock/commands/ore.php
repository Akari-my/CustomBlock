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

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool{
        if (!$sender instanceof Player){
            $sender->sendMessage(Loader::$prefix . "This command can only be executed in game");
        } else {
            $ore = new GuiOre($this->plugin);
            $ore->gui($sender);
        }
        return true;
    }
}