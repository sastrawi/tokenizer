<?php

namespace SastrawiTest\Tokenizer\CharAnalyzer;

use Sastrawi\Tokenizer\CharAnalyzer\Model;

class AlphanumericTest extends \PHPUnit_Framework_TestCase
{
    private $analyzer;

    public function setUp()
    {
        $this->analyzer = new \Sastrawi\Tokenizer\CharAnalyzer\Alphanumeric();
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sastrawi\Tokenizer\CharAnalyzer\AnalyzerInterface', $this->analyzer);
    }

    public function testAlphanumeric()
    {
        $this->assertTrue($this->analyzer->shouldSplit(new Model('abc', 0)));
        $this->assertTrue($this->analyzer->shouldSplit(new Model('.abc', 1)));
        $this->assertNull($this->analyzer->shouldSplit(new Model('abc', 1)));
        $this->assertNull($this->analyzer->shouldSplit(new Model('9a', 1)));
        $this->assertFalse($this->analyzer->shouldSplit(new Model('bbc', 1)));
    }

    public function testNonAlphanumeric()
    {
        $this->assertNull($this->analyzer->shouldSplit(new Model('#$%', 1)));
    }
}
