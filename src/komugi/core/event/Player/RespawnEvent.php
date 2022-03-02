<?php

namespace komugi\core\event\Player;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerRespawnEvent;
use pocketmine\player\GameMode;

class RespawnEvent implements Listener
{
    public function onrespawn(PlayerRespawnEvent $event)
    {
        $player = $event->getPlayer();
        $player->setGamemode(GameMode::ADVENTURE());
        $player->sendMessage("死んだため、アドベンチャーになりました");
    }
}