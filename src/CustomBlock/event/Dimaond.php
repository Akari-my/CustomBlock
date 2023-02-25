<?php

namespace CustomBlock\event;

use pocketmine\block\VanillaBlocks;
use pocketmine\data\bedrock\EnchantmentIdMap;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\Listener;
use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\EnchantmentInstance;
use pocketmine\item\enchantment\KnockbackEnchantment;
use pocketmine\item\enchantment\VanillaEnchantments;
use pocketmine\item\ItemFactory;
use pocketmine\item\VanillaItems;

class Dimaond implements Listener
{

    public function onBreak(BlockBreakEvent $event)
    {
        $player = $event->getPlayer();
        $block = $event->getBlock();
        $random = rand(0, 8);
        if ($block->getId() == VanillaBlocks::DIAMOND_ORE()->getId()) {
            if ($random == 1) {
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::IRON_HELMET()->getId(), 0, 1));
            } elseif ($random == 2) {
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::IRON_CHESTPLATE()->getId(), 0, 1));
            } elseif ($random == 3) {
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::IRON_LEGGINGS()->getId(), 0, 1));
            } elseif ($random == 4) {
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::IRON_BOOTS()->getId(), 0, 1));
            } elseif ($random == 5) {
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::IRON_SWORD()->getId(), 0, 1));
            } elseif ($random == 6) {
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::IRON_AXE()->getId(), 0, 1));
            } elseif ($random == 7) {
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::IRON_PICKAXE()->getId(), 0, 1));
            } elseif ($random == 8) {
                $player->getInventory()->addItem(ItemFactory::getInstance()->get(VanillaItems::GOLDEN_APPLE()->getId(), 0, rand(1, 32)));
            }
        }
        $event->setDrops([]);
        $event->setXpDropAmount(0);
    }
}