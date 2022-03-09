<?php

namespace komugi\core\event;

use pocketmine\Server;
use komugi\core\Gramineae;

use komugi\core\event\Player\JoinEvent;
use komugi\core\event\Player\InteractEvent;
use komugi\core\event\Player\RespawnEvent;

class EventManager
{
    public static function registerEvents(Gramineae $core)
    {
        Server::getInstance()->getPluginManager()->registerEvents(new JoinEvent($core),$core);
        Server::getInstance()->getPluginManager()->registerEvents(new InteractEvent($core),$core);
        Server::getInstance()->getPluginManager()->registerEvents(new RespawnEvent(), $core);
    }
}