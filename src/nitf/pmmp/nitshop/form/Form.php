<?php

namespace nitf\pmmp\nitshop\form;

use pocketmine\Player;

abstract class Form {

    private $functions = null;
    private $data = [];
    private $paths = "";

    public function __construct(?callable $callable, array $data_array, string $path) {
        $this->functions = $callable;
        $this->data = $data_array;
        $this->paths = $path;
    }

    public function call(Player $player): void {
        $api = new $this->paths($this->functions);
        foreach ($this->data as $data) {
            switch (key($data)) {
                case "title":
                    $api->setTitle($data);
                    break;
                case "content":
                    $api->setContent($data);
                    break;
                case "button":
                    foreach ($data as $button) {
                        $api->addButton($button);
                    }
                    break;
                case "button-1":
                    $api->setButton1($data);
                    break;
                case "button-2":
                    $api->setButton2($data);
                    break;
                case "label":
                    $api->addLabel($data[0], $data[1]);
                    break;
                case "slider":
                    $api->addSlider($data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                    break;
                case "step-slider":
                    $api->addStepSlider($data[0], $data[1], $data[2], $data[3]);
                    break;
                case "drop-down":
                    $api->addDropDown($data[0], $data[1], $data[2], $data[3]);
                    break;
                case "input":
                    $api->addInput($data[0], $data[1], $data[2], $data[3]);
                    break;
            }
        }
        $api->sendToPlayer($player);
    }
}