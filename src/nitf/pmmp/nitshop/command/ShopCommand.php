<?php

namespace nitf\pmmp\nitshop\command;

use nitf\pmmp\nitshop\form\MainForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class ShopCommand extends Command {

    public function __construct() {
        parent::__construct("shop", "NITSHOP", "/shop");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): bool {
        if (!$sender instanceof Player) {
            return false;
        }

        $main_form = new MainForm();
        $main_form->register();
        $main_form->call($sender);
    }
}