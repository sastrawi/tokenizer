<?php

namespace Sastrawi\Tokenizer\CharAnalyzer;

class Alphanumeric implements AnalyzerInterface
{
    private static $alphanumericChars = array();

    private static $alphanumericStr = 'abcdefghijklmnopqrstuvwxyz1234567890';

    public function shouldSplit(Model $model)
    {
        if (self::isAlphanumeric($model->getCurrentChar()) && $model->getCurrentChar() === $model->getPrevChar()) {
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
}
