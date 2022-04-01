<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class LettersInText extends AbstractMigration
{

    public function up(): void
    {
        $sql = "CREATE TABLE `number_of_each_letter_in_text` (
            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
            `input` text NOT NULL,
            `output` varchar(255) NOT NULL,
            PRIMARY KEY (`id`)
          )";
    }
}
