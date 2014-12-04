<?php

namespace SastrawiTest\Tokenizer\CharAnalyzer;

use Sastrawi\Tokenizer\CharAnalyzer\Model;

class WhitespaceTest extends \PHPUnit_Framework_TestCase
{
    private $analyzer;

    public function setUp()
    {
        $this->analyzer = new \Sastrawi\Tokenizer\CharAnalyzer\Whitespace();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface', $this->analyzer);
    }

    public function testAlphanumeric()
    {
        $this->assertTrue($this->analyzer->shouldSplit(new Model(' ', 0)));
        $this->assertNull($this->analyzer->shouldSplit(new Model('abc', 1)));
    }
}
