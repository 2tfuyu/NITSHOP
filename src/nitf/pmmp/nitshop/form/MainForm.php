<?php

namespace nitf\pmmp\nitshop\form;

use nitf\pmmp\nitshop\config\ConfigManager;
use pocketmine\Player;
use jojoe77777\FormAPI\SimpleForm;

class MainForm extends Form implements ButtonIds {

    public function register(): void {
        $function = function (Player $player, int $id = 0) {
            if (empty($id)) {
                return;
            }
            switch ($id) {
                case ButtonIds::BACK_BUTTON:
                    break;
                case ButtonIds::BLOCK_BUTTON:
                    $form = new BlockForm();
                    break;
            }
            if (isset($form)){
                $form->register();
                $form->call($player);
            }
        };
        $config = new ConfigManager();
        $data = $config->getConfig("Form")->get("main");
        parent::__construct($function, $data, SimpleForm::class);
    }
}