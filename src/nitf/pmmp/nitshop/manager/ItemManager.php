<?php

namespace nitf\pmmp\nitshop\manager;

use nitf\pmmp\nitshop\config\ConfigManager;
use pocketmine\item\Item;

class ItemManager extends ConfigManager {

    public function __construct(){

    }

    public function getItems(bool $key = false): array {
        return $this->getConfig()->getAll($key);
    }

    public function getData(string $name): ?array {
        return $this->getConfig()->get($name);
    }

    public function addItem(Item $item, string $name, int $price = 0, int $amount = 0): void {
        $data = [
            "id" => $item->getId(),
            "price" => $price,
            "amount" => $amount
        ];
        $this->getConfig()->set($name, $data);
    }

    public function removeItem(string $name): void {
        $this->getConfig()->remove($name);
    }
}