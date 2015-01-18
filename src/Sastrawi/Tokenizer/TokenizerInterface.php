<?php

namespace Sastrawi\Tokenizer;

interface TokenizerInterface
{
    /**
     * @return array Array of token
     */
    public function tokenize($text);
}
