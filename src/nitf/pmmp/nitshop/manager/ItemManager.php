<?php

namespace nitf\pmmp\nitshop\manager;

use nitf\pmmp\nitshop\config\ConfigManager;
use pocketmine\item\Item;

class ItemManager {

    private $config = null;

    public function __construct() {
        $manager = new ConfigManager();
        $this->config = $manager->getConfig("Item");
    }

    public function getItems(bool $key = false): array {
        return $this->config->getAll($key);
    }

    public function getItem(string $name): ?array {
        return $this->config->get($name);
    }

    public function addItem(string $name, int $id, int $damage, int $price = 0): void {
        $data = [
            "id" => $id,
            "meta" => $damage,
            "price" => $price
        ];
        $this->config->set($name, $data);
    }

    public function removeItem(string $name): void {
        $this->config->remove($name);
    }
}