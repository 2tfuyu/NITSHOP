<?php

namespace nitf\pmmp\nitshop\form;

use jojoe77777\FormAPI\CustomForm;
use nitf\pmmp\nitshop\config\ConfigManager;
use pocketmine\item\Item;
use pocketmine\Player;

class ConfirmForm extends Form implements ButtonIds {

    private $data = [];

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function register(): void {
        $function = function (Player $player, ?array $custom) {
            if (empty($custom)) {
                return;
            }
            $amount = $custom[0];
            $price = $this->data["price"] * $amount; // そのうち自作プラグインに対応させる
            $item = new Item($this->data["id"], $this->data["meta"], $amount);
            $player->getInventory()->addItem($item);
        };
        $config = new ConfigManager();
        $data = $config->getConfig("Form")->get("confirm");
        parent::__construct($function, $data, CustomForm::class);
    }
}