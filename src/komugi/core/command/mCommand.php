<?php

namespace komugi\core\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\GameMode;
use pocketmine\player\Player;
use komugi\core\Gramineae;

class mCommand extends Command
{
    private $core;

    public function __construct(Gramineae $core)
    {
        parent::__construct("m", "自分のワールドにtp", "/m");
        $this->core = $core;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player){
            $name = $sender->getName();
            $sender->teleport($this->core->getServer()->getWorldManager()->getWorldByName($name)->getSpawnLocation());
            $sender->setGamemode(GameMode::CREATIVE());
            $sender->sendMessage('§b >> 自分のワールドにtpしました');
        }
        return true;
    }
}