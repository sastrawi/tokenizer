<?php

namespace SastrawiTest\Tokenizer;

use Sastrawi\Tokenizer\DefaultTokenizer;

class DefaultTokenizerTest extends \PHPUnit_Framework_TestCase
{
    private $tokenizer;

    public function setUp()
    {
        $this->tokenizer = new DefaultTokenizer();
    }

    public function testGetDefaultAnalyzers()
    {
        $this->assertNotEmpty($this->tokenizer->getAnalyzers());
    }

    public function testAddGetAnalyzers()
    {
        $count = count($this->tokenizer->getAnalyzers());
        $this->tokenizer->addAnalyzer($this->getMock('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface'));
        $this->tokenizer->addAnalyzers(array($this->getMock('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface')));

        $this->assertCount($count+2, $this->tokenizer->getAnalyzers());
    }

    public function testTokenize()
    {
        $this->assertEquals(array('Saya', 'belajar', '.'), $this->tokenizer->tokenize('Saya belajar.'));
    }
}
