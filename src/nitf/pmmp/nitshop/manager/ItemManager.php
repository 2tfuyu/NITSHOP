<?php

namespace nitf\pmmp\nitshop\manager;

use nitf\pmmp\nitshop\config\ConfigManager;
use pocketmine\item\Item;

class ItemManager {

    private $config = null;

    public function __construct() {
        $this->config = (new ConfigManager())->getConfig("Item");
    }

    public function getItems(bool $key = false): array {
        return $this->config->getAll($key);
    }

    public function getData(string $name): ?array {
        return $this->config->get($name);
    }

    public function addItem(Item $item, string $name, int $price = 0, int $amount = 0): void {
        $data = [
            "id" => $item->getId(),
            "price" => $price,
            "amount" => $amount
        ];
        $this->config->set($name, $data);
    }

    public function removeItem(string $name): void {
        $this->config->remove($name);
    }
}