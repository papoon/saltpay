<?php

namespace Services;

use Services\PlayWithStrings;
use Models\DB;
use Models\NumberOfCharInText;

class FactoryServicePlayWithStrings
{

    /**
     *
     * @return PlayWithStrings
     */
    public static function getInstance(): PlayWithStrings
    {
        return new PlayWithStrings(new NumberOfCharInText(DB::getConnection()));
    }
}
