<?php

namespace nitf\pmmp\nitshop\manager;

use nitf\pmmp\nitshop\config\ConfigManager;

class ItemManager extends ConfigManager {

    private $items = [];

    public function __construct(){

    }

    public function getItems(bool $key = false): array {
        return $this->getConfig()->getAll($key);
    }
}