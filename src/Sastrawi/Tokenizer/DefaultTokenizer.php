<?php
/**
 * Sastrawi Tokenizer (https://github.com/sastrawi/tokenizer)
 *
 * @link      http://github.com/sastrawi/tokenizer for the canonical source repository
 * @license   https://github.com/sastrawi/tokenizer/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Tokenizer;

use Sastrawi\Tokenizer\Util\StringUtil;
use Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface;

/**
 * Default tokenizer for Bahasa Indonesia.
 *
 * @author Andy Librian
 */
class DefaultTokenizer
{
    /**
     * @var \Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface[]
     */
    private $analyzers = array();
    
    public function __construct()
    {
        $this->addAnalyzer(new CharAnalyzer\Whitespace());
        $this->addAnalyzer(new CharAnalyzer\Punctuation());
    }

    public function addAnalyzers(array $analyzers)
    {
        foreach ($analyzers as $analyzer) {
            $this->addAnalyzer($analyzer);
        }
    }

    public function addAnalyzer(AnalyzerInterface $analyzer)
    {
        $this->analyzers[] = $analyzer;
    }

    /**
     * {@inheritdoc}
     */
    public function tokenize($text)
    {
        $tokens = array();
        $tokenBuffer = '';

        for ($i = 0; $i < strlen($text); $i++) {

            $model = new CharAnalyzer\Model($text, $i);

            $analyzerResultFalse = 0;
            $analyzerResultTrue  = 0;
            $analyzerResultNull  = 0;
            $analyzerResult = null;

            foreach ($this->analyzers as $analyzer) {

                $analyzerResult = $analyzer->shouldSplit($model);

                if ($analyzerResult === true) {
                    $analyzerResultTrue++;
                } elseif ($analyzerResult === false) {
                    $analyzerResultFalse++;
                } elseif ($analyzerResult === null) {
                    $analyzerResultNull++;
                }
            }

            if ($analyzerResultTrue > 0 && $analyzerResultTrue >= $analyzerResultFalse) {

                if ($model->getCurrentChar() !== ' ') {
                    $tokens[] = $tokenBuffer;
                    $tokenBuffer = '';

                    $tokenBuffer = $model->getCurrentChar();
                } else {
                    
                    if (!empty($tokenBuffer)) {
                        $tokens[] = $tokenBuffer;
                        $tokenBuffer = '';
                    }
                }
            } else {
                $tokenBuffer .= $model->getCurrentChar();
            }
        }

        if (!empty($tokenBuffer)) {
            $tokens[] = $tokenBuffer;
        }

        return $tokens;
    }
}
