<?php

namespace Services;

use Models\NumberOfCharInText;
use Utils\StringOperations;

class PlayWithStrings
{

    private $modelNumberOfCharInText;
    public function __construct(NumberOfCharInText $model)
    {
        $this->modelNumberOfCharInText = $model;
    }

    /**
     * return number of repaeted char in text - only letters
     *
     * @param string $text
     * @return string
     * @throws \UnexpectedValueException
     */
    public function getAsteriskNumberOfCharInText(string $text): string
    {
        if (empty($text)) {
            throw new \UnexpectedValueException('Empty String');
        }

        $text             = preg_replace('/[^a-z]/i', '', $text);
        $numberOfEachChar = StringOperations::countHowManyCharInText(strtolower($text), '*');

        $formatResult = str_replace(['"', '{', '}'], ['', '("', '")'], json_encode($numberOfEachChar));

        $this->modelNumberOfCharInText->insert([
            'input'  => $text,
            'output' => $formatResult
        ]);

        return $formatResult;
    }
}
