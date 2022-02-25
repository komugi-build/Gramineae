<?php

namespace komugi\core\event\Player;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\math\Vector3;
use komugi\core\Gramineae;
use pocketmine\player\GameMode;
use pocketmine\world\WorldCreationOptions;
use pocketmine\world\generator\Flat;

class JoinEvent implements Listener
{
    private $core;

    public function __construct(Gramineae $core)
    {
        $this->core = $core;
    }

    public function onjoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $name = $player->getName();
        if (!$this->core->getServer()->getWorldManager()->getWorldByName($name)){
            $option = WorldCreationOptions::create();
            $option->setGeneratorClass(Flat::class);
            $this->core->getServer()->getWorldManager()->generateWorld($name ,$option);
            $this->core->getServer()->getWorldManager()->getWorldByName($name)->setSpawnLocation(new Vector3(0, 4, 0)); 
            $player->sendMessage('ワールドを作成しました');
            $player->teleport($this->core->getServer()->getWorldManager()->getWorldByName($name)->getSpawnLocation());
            $player->setGamemode(GameMode::CREATIVE());
            $event->setJoinMessage('§b >> '.$name.'さんが"初"参加しました');
        }else{
            $event->setJoinMessage('§b >> '.$name.'さんが参加しました');
        }
    }
}