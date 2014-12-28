<?php

namespace Sastrawi\Tokenizer\CharAnalyzer;

class Hyphen implements AnalyzerInterface
{
    private static $alphabetStr = 'abcdefghijklmnopqrstuvwxyz';

    private static $alphabetChars = array();

    public function shouldSplit(Model $model)
    {
        if ($model->getCurrentChar() === '-') {
            // don't split dash
            if ($model->getNextChar() === '-') {
                return true;
            } elseif (self::isAlphabet($model->getPrevChar()) && self::isAlphabet($model->getNextChar())) {
                return false;
            }
        }
    }

    private static function isAlphabet($char)
    {
        if (empty(self::$alphabetChars)) {
            for ($i = 0; $i < strlen(self::$alphabetStr); $i++) {
                self::$alphabetChars[] = self::$alphabetStr[$i];
            }
        }

        return in_array(strtolower($char), self::$alphabetChars);
    }
}
