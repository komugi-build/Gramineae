<?php

namespace komugi\core\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use komugi\core\Gramineae;

class tCommand extends Command
{
    private $core;

    public function __construct(Gramineae $core)
    {
        parent::__construct("t", "人のワールドにtp", "/t Player");
        $this->core = $core;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player){
            if (isset($args[0])){
                if ($this->core->getServer()->getWorldManager()->getWorldByName($args[0])){
                    $sender->teleport($this->core->getServer()->getWorldManager()->getWorldByName($args[0])->getSpawnLocation());
                    $sender->setGamemode(GameMode::ADVENTURE());
                    $sender->sendMessage('§b >> '.$args[0].'さんのワールドに入りました');
                }else{
                    $sender->sendMessage('§c >> '.$args[0].'さんが存在しません。(大文字小文字を見てください)');
                }
            }else{
                $sender->sendMessage('§c >> /t {Player名}で使用してください');
            }
        }
        return true;
    }
}