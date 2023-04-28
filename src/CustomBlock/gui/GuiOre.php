<?php

namespace CustomBlock\gui;

use CustomBlock\Loader;
use muqsit\invmenu\InvMenu;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;
use pocketmine\block\VanillaBlocks;
use pocketmine\item\ItemIds;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use pocketmine\utils\Config;

class GuiOre {

    protected Loader $plugin;

    public function __construct(Loader $plugin){
        $this->plugin = $plugin;
    }

    public function gui(Player $player){
        $data = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML);
        $menu = InvMenu::create(InvMenu::TYPE_CHEST);
        $menu->setName($data->getNested("inventory.guiore.title"));

        $diamond_item = VanillaItems::DIAMOND()->setCustomName($data->getNested("inventory.guiore.diamond_item"));
        $emerald_item = VanillaItems::EMERALD()->setCustomName($data->getNested("inventory.guiore.emerald_item"));
        $gold_item = VanillaItems::GOLD_INGOT()->setCustomName($data->getNested("inventory.guiore.gold_item"));
        $iron_item = VanillaItems::IRON_INGOT()->setCustomName($data->getNested("inventory.guiore.iron_item"));

        $inv = $menu->getInventory();
        $inv->setItem($data->getNested("inventory.guiore.slots.diaslot"), $diamond_item);
        $inv->setItem($data->getNested("inventory.guiore.slots.emeslot"), $emerald_item);
        $inv->setItem($data->getNested("inventory.guiore.slots.goldslot"), $gold_item);
        $inv->setItem($data->getNested("inventory.guiore.slots.ironslot"), $iron_item);

        $menu->setListener(function(InvMenuTransaction $transaction) : InvMenuTransactionResult{
            $player = $transaction->getPlayer();
            $data = new Config($this->plugin->getDataFolder() . "config.yml", Config::YAML);

            if($transaction->getOut()->getId() === ItemIds::DIAMOND){
                $player->getInventory()->addItem(VanillaBlocks::DIAMOND_ORE()->asItem()->setCount(64));
                $player->sendMessage($data->getNested("message.diamandore"));
                return $transaction->discard();
            }
            if($transaction->getOut()->getId() === ItemIds::GOLD_INGOT){
                $player->getInventory()->addItem(VanillaBlocks::GOLD_ORE()->asItem()->setCount(64));
                $player->sendMessage($data->getNested("message.goldore"));
                return $transaction->discard();
            }
            if($transaction->getOut()->getId() === ItemIds::IRON_INGOT){
                $player->getInventory()->addItem(VanillaBlocks::IRON_ORE()->asItem()->setCount(64));
                $player->sendMessage($data->getNested("message.ironore"));
                return $transaction->discard();
            }
            if($transaction->getOut()->getId() === ItemIds::EMERALD){
                $player->getInventory()->addItem(VanillaBlocks::EMERALD_ORE()->asItem()->setCount(64));
                $player->sendMessage($data->getNested("message.emeraldore"));
                return $transaction->discard();
            }

            return $transaction->continue();
        });

        $menu->send($player, "Ore GUI");
    }
}