<?php

namespace nitf\pmmp\nitshop\form;

use pocketmine\Player;
use jojoe77777\FormAPI\SimpleForm;

class MainForm extends Form {

    public function register(): void {
        $function = function (Player $player, int $button = 0) {

        };
        $data = [
            "title" => "MainForm",
            "content" => "",
            "button" => [
                "sample",
                "sample"
            ]
        ];
        parent::__construct($function, $data, SimpleForm::class);
    }
}