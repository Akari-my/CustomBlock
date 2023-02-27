<?php

namespace CustomBlock\event;

use pocketmine\block\VanillaBlocks;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\ItemFactory;
use pocketmine\item\VanillaItems;
use pocketmine\world\Explosion;

class Iron implements Listener {

    public function onBreak(BlockBreakEvent $event){
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $random = rand(0, 9);
        if($block->getId() == VanillaBlocks::IRON_ORE()->getId()){
            if($random == 1){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::CHAINMAIL_HELMET()->getId(), 0, 1));
            } elseif($random == 2){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::CHAINMAIL_CHESTPLATE()->getId(), 0, 1));
            } elseif($random == 3){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::CHAINMAIL_LEGGINGS()->getId(), 0, 1));
            } elseif($random == 4){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::CHAINMAIL_BOOTS()->getId(), 0, 1));
            } elseif($random == 5){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::STONE_SWORD()->getId(), 0, 1));
            } elseif($random == 6){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::STONE_AXE()->getId(), 0, 1));
            } elseif($random == 7){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::STONE_PICKAXE()->getId(), 0, 1));
            } elseif($random == 8){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::BOW()->getId(), 0, 1));
            } elseif($random == 9){
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::ARROW()->getId(), 0, rand(10, 50)));
            } elseif($random == 0){
                $pos = $block->getPosition();
                $explosion = new Explosion($pos, 4);
                $explosion->explodeA();
                $explosion->explodeB();
            }
        }
    }
}