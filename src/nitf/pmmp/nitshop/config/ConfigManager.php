<?php

namespace nitf\pmmp\nitshop\config;

use pocketmine\utils\Config;

class ConfigManager {

    private static $config = null;

    public static function init(string $path): void {
        self::$config = new Config($path . "Item.yml", Config::YAML);
    }

    protected function getConfig(): ?Config {
        return self::$config;
    }
}