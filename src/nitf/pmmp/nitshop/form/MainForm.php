<?php

namespace nitf\pmmp\nitshop\form;

use pocketmine\Player;
use jojoe77777\FormAPI\SimpleForm;

class MainForm extends Form implements ButtonIds {

    public function __construct() {
    }

    public function register(): void {
        $function = function (Player $player, int $button = 0) {
            if (empty($button)) {
                return;
            }
            switch ($button) {
                case ButtonIds::BACK_BUTTON:
                    break;
                case ButtonIds::BLOCK_BUTTON:
                    break;
            }
        };
        $data = [
            "title" => "MainForm",
            "content" => "",
            "button" => [
                "close",
                "block"
            ]
        ];
        parent::__construct($function, $data, SimpleForm::class);
    }
}