<?php

namespace Sastrawi\Tokenizer;

class TokenizerFactory
{
    public static function createDefaultTokenizer()
    {
        $tokenizer = new DefaultTokenizer();

        return $tokenizer;
    }
}
