<?php

namespace Utils;

class StringOperations
{

    /**
     * return array char index based with count or replace by a "symbol"
     *
     * @param string $text
     * @param string|null $replaceNumberBySymbol
     * @return array
     */
    public static function countHowManyCharInText(string $text, ?string $replaceNumberBySymbol = null): array
    {
        if (empty($text)) {
            return [];
        }

        $arrayHowManyChar = [];
        foreach (str_split($text) as $char) {
            if (!empty($arrayHowManyLetters[$char])) {
                continue;
            }
            $numberOfChar            = substr_count($text, $char);
            $arrayHowManyChar[$char] = empty($replaceNumberBySymbol) ? $numberOfChar : str_repeat($replaceNumberBySymbol, $numberOfChar);
        }
        return $arrayHowManyChar;
    }
}
