<?php

namespace nitf\pmmp\nitshop;

use nitf\pmmp\nitshop\command\ShopCommand;
use nitf\pmmp\nitshop\config\ConfigManager;
use pocketmine\plugin\PluginBase;

class NitShopPlugin extends PluginBase {

    public function onEnable(): void {
        $path = $this->getDataFolder();
        if (!file_exists($path)) {
            @mkdir($path);
        }
        $this->getServer()->getCommandMap()->register('shop', new ShopCommand());

        $files = ["Item", "Form"];
        ConfigManager::init($path, $files);
        foreach ($files as $file) {
            $this->saveResource($file . ".yml");
        }
    }
}