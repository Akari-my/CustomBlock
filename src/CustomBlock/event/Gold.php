<?php

namespace CustomBlock\event;

use pocketmine\block\VanillaBlocks;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;

class Gold implements Listener {

    public function onBreak(BlockBreakEvent $event){
        $block = $event->getBlock();
        $player = $event->getPlayer();
        if ($block->getId() == VanillaBlocks::GOLD_ORE()->getId()) {
            if($player->getAbsorption() == 10){
                $event->cancel();
            } else {
                $cuori = $player->getAbsorption()+2;
                $player->setAbsorption($cuori);
            }
        }
        $event->setDrops([]);
    }
}