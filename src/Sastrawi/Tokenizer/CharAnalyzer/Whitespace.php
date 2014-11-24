<?php

namespace Sastrawi\Tokenizer\CharAnalyzer;

class Whitespace implements AnalyzerInterface
{
    public function shouldSplit(Model $model)
    {
        if ($model->getCurrentChar() === ' ') {
            return true;
        }
    }
}
