<?php

namespace Sastrawi\Tokenizer\CharAnalyzer;

class Whitespace implements AnalyzerInterface
{
    public function shouldSplit(Model $model)
    {
        if (in_array($model->getCurrentChar(), array(' ', "\n", "\t"))) {
            return true;
        }
    }
}
