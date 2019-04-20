<?php

namespace nitf\pmmp\nitshop\config;

use pocketmine\utils\Config;

class ConfigManager {

    private static $config = [];

    public static function init(string $path): void {
        self::$config["Item"] = new Config($path . "Item.yml", Config::YAML);
    }

    protected function getConfig(string $name): ?Config {
        return self::$config[$name];
    }
}