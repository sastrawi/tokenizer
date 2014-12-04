<?php

namespace Sastrawi\Tokenizer\CharAnalyzer;

class Punctuation implements AnalyzerInterface
{
    private static $punctuationChars = array(
        ',', '.', ';', ':', '?', '!', '"', '(', ')', '\'',
        '[', ']', '+', '=', '*', '&', '^', '%', '$', '#',
        '@', '~', '`', '{', '}', '\\', '|', '>', '<',
    );

    public function shouldSplit(Model $model)
    {
        if (self::isPunctuation($model->getCurrentChar()) && $model->getCurrentChar() === $model->getPrevChar()) {
            return false;
        } elseif (self::isPunctuation($model->getCurrentChar())) {
            return true;
        }
    }

    private static function isPunctuation($char)
    {
        return in_array($char, self::$punctuationChars);
    }
}
