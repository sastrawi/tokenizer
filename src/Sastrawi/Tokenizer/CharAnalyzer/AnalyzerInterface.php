<?php

namespace Sastrawi\Tokenizer\CharAnalyzer;

interface AnalyzerInterface
{
    public function shouldSplit(Model $model);
}
