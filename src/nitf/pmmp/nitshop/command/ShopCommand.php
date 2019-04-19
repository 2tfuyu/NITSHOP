<?php

namespace nitf\pmmp\nitshop\command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class ShopCommand extends Command {

    public function __construct() {
        parent::__construct("shop", "NITSHOP", "/shop");
    }

    public function execute(CommandSender $sender, string $label, array $args): bool {
    }
}