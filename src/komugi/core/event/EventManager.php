<?php

namespace komugi\core\event;

use pocketmine\Server;
use komugi\core\Gramineae;

use komugi\core\event\Player\JoinEvent;

class EventManager
{
    public static function registerEvents(Gramineae $core)
    {
        Server::getInstance()->getPluginManager()->registerEvents(new JoinEvent($core),$core);
    }
}