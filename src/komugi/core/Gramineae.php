<?php

namespace komugi\core;

use pocketmine\plugin\PluginBase;
use komugi\core\command\CommandMap;
use komugi\core\event\EventManager;

class Gramineae extends PluginBase
{
    public function onEnable(): void
    {
        date_default_timezone_set('Asia/Tokyo');
        EventManager::registerEvents($this);
        CommandMap::registerCommands($this);
    }
}