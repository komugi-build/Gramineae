<?php

namespace komugi\core\event\Player;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use komugi\core\Gramineae;

class InteractEvent implements Listener
{
    private $core;

    public function __construct(Gramineae $core)
    {
        $this->core = $core;
    }

    public function ontap(PlayerInteractEvent $event)
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        if ($player->getWorld()->getFolderName() !== $name){
            $event->cancel();
            $player->sendPopup('他人のワールドでは、アイテムを使う事はできません');
        }
    }
}