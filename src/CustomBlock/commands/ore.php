<?php

namespace CustomBlock\commands;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;
use pocketmine\block\VanillaBlocks;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\ItemIds;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use CustomBlock\Loader;

class ore extends Command{

    protected Loader $plugin;

    public function __construct(Loader $plugin){
        $this->plugin = $plugin;
        parent::__construct("ore", "Ore Command");
        $this->setPermission("skywarsplus.ore.command");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args){
        if ($sender instanceof Player){
            $this->openOreGUI($sender);
        } else {
            $sender->sendMessage(Main::$prefix . "Questo comando può essere eseguito solo in gioco");
        }
        return true;
    }

    public function openOreGui(Player $player){
        $menu = InvMenu::create(InvMenu::TYPE_CHEST);
        $menu->setName("Ore GUI");

        $diamond_item = VanillaItems::DIAMOND()->setCustomName("Diamond Ore");
        $emerald_item = VanillaItems::EMERALD()->setCustomName("Emerald Ore");
        $gold_item = VanillaItems::GOLD_INGOT()->setCustomName("Gold Ore");
        $iron_item = VanillaItems::IRON_INGOT()->setCustomName("Iron Ore");

        $inv = $menu->getInventory();
        $inv->setItem(10, $diamond_item);
        $inv->setItem(12, $emerald_item);
        $inv->setItem(14, $gold_item);
        $inv->setItem(16, $iron_item);
        $inv->setItem(22, $redstone_item);

        $menu->setListener(function(InvMenuTransaction $transaction) : InvMenuTransactionResult{
            $player = $transaction->getPlayer();

            if($transaction->getOut()->getId() === ItemIds::DIAMOND){
                $player->getInventory()->addItem(VanillaBlocks::DIAMOND_ORE()->asItem()->setCount(64));
                $player->sendMessage(Main::$prefix . "Hai ricevuto uno Stack di §bDiamond Ore§7!");
                return $transaction->discard();
            }
            if($transaction->getOut()->getId() === ItemIds::EMERALD){
                $player->getInventory()->addItem(VanillaBlocks::EMERALD_ORE()->asItem()->setCount(64));
                $player->sendMessage(Main::$prefix . "§7Hai ricevuto uno Stack di §aEmerald Ore§7!");
                return $transaction->discard();
            }
            if($transaction->getOut()->getId() === ItemIds::GOLD_INGOT){
                $player->getInventory()->addItem(VanillaBlocks::GOLD_ORE()->asItem()->setCount(64));
                $player->sendMessage(Main::$prefix . "§7Hai ricevuto uno Stack di §eGold Ore§7!");
                return $transaction->discard();
            }
            if($transaction->getOut()->getId() === ItemIds::IRON_INGOT){
                $player->getInventory()->addItem(VanillaBlocks::IRON_ORE()->asItem()->setCount(64));
                $player->sendMessage(Main::$prefix . "§7Hai ricevuto uno Stack di §fIron Ore§7!");
                return $transaction->discard();
            }

            return $transaction->continue();
        });

        $menu->send($player, "Ore GUI");
    }
}
