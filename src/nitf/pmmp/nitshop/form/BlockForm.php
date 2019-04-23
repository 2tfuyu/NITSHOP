<?php

namespace nitf\pmmp\nitshop\form;

use jojoe77777\FormAPI\SimpleForm;
use nitf\pmmp\nitshop\config\ConfigManager;
use nitf\pmmp\nitshop\manager\ItemManager;
use pocketmine\Player;

class BlockForm extends Form implements ButtonIds {

    private $buttons = [];

    public function __construct() {
    }

    public function register(): void {
        $function = function (Player $player, int $id = 0) {
            if (empty($id)){
                return;
            }
            $item = $this->buttons[$id];
            $manager = new ItemManager();
            $data = $manager->getItem($item);

            $confirm = new ConfirmForm($data);
            $confirm->register();
            $confirm->call($player);
        };
        $config = new ConfigManager();
        $data = $config->getConfig("Form")->get("block");
        foreach ($data["button"] as $button) {
            $this->buttons[] = $button;
        }
        parent::__construct($function, $data, SimpleForm::class);
    }
}