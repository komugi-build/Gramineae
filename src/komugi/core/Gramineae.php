<?php

namespace komugi\core;

use pocketmine\plugin\PluginBase;
use komugi\core\command\CommandMap;
use komugi\core\event\EventManager;
use pocketmine\utils\Config;

use bbo51dog\pmdiscord\connection\Webhook;
use bbo51dog\pmdiscord\element\Content;


class Gramineae extends PluginBase
{
    public function onEnable(): void
    {
        date_default_timezone_set('Asia/Tokyo');
        EventManager::registerEvents($this);
        CommandMap::registerCommands($this);
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, [
            'webhooktoken' => 'https://discordapp.com/api/webhooks/00000/xxxxx'
        ]);
        $webhook = Webhook::create($this->config->get('webhooktoken'));
        $content = new Content();
        $content->setText("起動しました");
        $webhook->add($content);
        $webhook->send();
    }

    public function onDisable(): void
    {
        $webhook = Webhook::create($this->config->get('webhooktoken'));
        $content = new Content();
        $content->setText("停止");
        $webhook->add($content);
        $webhook->send();
    }

}