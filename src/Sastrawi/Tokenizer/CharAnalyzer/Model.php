<?php

namespace Sastrawi\Tokenizer\CharAnalyzer;

class Model
{
    private $text;

    private $charPos;

    private $currentChar;

    private $nextChar;

    private $prevChar;

    public function __construct($text, $charPos)
    {
        $this->text = $text;
        $this->charPos = $charPos;
        $this->currentChar = $text[$charPos];

        if ($charPos < strlen($text) - 1) {
            $this->nextChar = $text[$charPos + 1];
        }

        if ($charPos > 0) {
            $this->prevChar = $text[$charPos - 1];
        }
    }

    public function getText()
    {
        return $this->text;
    }

    public function getCharPos()
    {
        return $this->charPos;
    }

    public function getCurrentChar()
    {
        return $this->currentChar;
    }

    public function getNextChar()
    {
        return $this->nextChar;
    }

    public function getPrevChar()
    {
        return $this->prevChar;
    }
}
