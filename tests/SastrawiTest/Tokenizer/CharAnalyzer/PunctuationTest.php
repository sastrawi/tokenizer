<?php

namespace SastrawiTest\Tokenizer\CharAnalyzer;

use Sastrawi\Tokenizer\CharAnalyzer\Model;

class PunctuationTest extends \PHPUnit_Framework_TestCase
{
    private $analyzer;

    public function setUp()
    {
        $this->analyzer = new \Sastrawi\Tokenizer\CharAnalyzer\Punctuation();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface', $this->analyzer);
    }

    public function testShouldSplit()
    {
        $this->assertTrue($this->analyzer->shouldSplit(new Model('abc!', 3)));
        $this->assertFalse($this->analyzer->shouldSplit(new Model('!!!', 1)));
        $this->assertNull($this->analyzer->shouldSplit(new Model('abdef', 3)));
    }
}
