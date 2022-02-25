<?php

namespace komugi\core\command;

use pocketmine\Server;
use komugi\core\Gramineae;

class CommandMap
{
    const plugin = "Gramineae";

    public static function registerCommands(Gramineae $core)
    {
        Server::getInstance()->getCommandMap()->register(self::plugin,new mCommand($core));
        Server::getInstance()->getCommandMap()->register(self::plugin,new tCommand($core));
    }
}