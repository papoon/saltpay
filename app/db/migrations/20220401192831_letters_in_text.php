<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class LettersInText extends AbstractMigration
{
    //Took 0.0338s
    public function up(): void
    {
        $sql = "CREATE TABLE number_of_each_letter_in_text (
            id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            input TEXT NOT NULL,
            output VARCHAR(255) NOT NULL
            )";

        $this->execute($sql);
    }
}
