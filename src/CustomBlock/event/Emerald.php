<?php

namespace CustomBlock\event;

use pocketmine\block\VanillaBlocks;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\enchantment\VanillaEnchantments;
use pocketmine\item\ItemFactory;
use pocketmine\item\VanillaItems;

class Emerald implements Listener {

    public function onBreak(BlockBreakEvent $event){
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $random = rand(0, 7);
        if($block->getId() == VanillaBlocks::EMERALD_ORE()->getId()){
            $fish = ItemFactory::getInstance()->get(VanillaItems::CLOWNFISH()->getId(), 0, 1);
            $fish->setCustomName("§7[§gKnockback §eFish§7]");
            $fish->addEnchantment(new EnchantmentInstance(VanillaEnchantments::KNOCKBACK(), 1));
            if($random == 1){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::DIAMOND_HELMET()->getId(), 0, 1));
            } elseif($random == 2){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::DIAMOND_CHESTPLATE()->getId(), 0, 1));
            } elseif($random == 3){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::DIAMOND_LEGGINGS()->getId(), 0, 1));
            } elseif($random == 4){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::DIAMOND_BOOTS()->getId(), 0, 1));
            } elseif($random == 5){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::DIAMOND_SWORD()->getId(), 0, 1));
            } elseif($random == 6){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::DIAMOND_AXE()->getId(), 0, 1));
            } elseif($random == 7){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::DIAMOND_PICKAXE()->getId(), 0, 1));
            } elseif($random == 0){
                $player->getInventory()->addItem($fish);
            }
        }
        $event->setDrops([]);
        $event->setXpDropAmount(0);
    }
}