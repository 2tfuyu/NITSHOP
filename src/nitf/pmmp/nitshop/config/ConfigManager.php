<?php

namespace nitf\pmmp\nitshop\config;

use pocketmine\utils\Config;

class ConfigManager {

    private static $config = [];

    public static function init(string $path, array $names): void {
        foreach ($names as $name) {
            self::$config[$name] = new Config($path . $name . ".yml", Config::YAML);
        }
    }

    public function getConfig(string $name): ?Config {
        return self::$config[$name];
    }
}