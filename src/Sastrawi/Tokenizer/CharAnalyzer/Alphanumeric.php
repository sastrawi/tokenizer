<?php

namespace Sastrawi\Tokenizer\CharAnalyzer;

class Alphanumeric implements AnalyzerInterface
{
    private static $alphanumericChars = array();

    private static $alphanumericStr = 'abcdefghijklmnopqrstuvwxyz1234567890';

    public function shouldSplit(Model $model)
    {
        if (self::isAlphanumeric($model->getCurrentChar())
            && ($model->getCurrentChar() === $model->getPrevChar()
            || ($model->getPrevChar() === '-' && !self::prevCharIsDash($model)))) {
            return false;
        } elseif (self::isAlphanumeric($model->getCurrentChar()) && !self::isAlphanumeric($model->getPrevChar())) {
            return true;
        }
    }

    private static function isAlphanumeric($char)
    {
        if (empty(self::$alphanumericChars)) {
            for ($i = 0; $i < strlen(self::$alphanumericStr); $i++) {
                self::$alphanumericChars[] = self::$alphanumericStr[$i];
            }
        }

        return in_array(strtolower($char), self::$alphanumericChars);
    }

    private static function prevCharIsDash(Model $model)
    {
        if ($model->getPrevChar() === '-') {
            $prev2 = $model->getCharPos() - 2;

            $text = $model->getText();
            if ($prev2 > 0 && $text[$prev2] === '-') {
                return true;
            }
        }

        return false;
    }
}
