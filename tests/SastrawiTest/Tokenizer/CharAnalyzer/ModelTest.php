<?php

namespace SastrawiTest\Tokenizer\CharAnalyzer;

use Sastrawi\Tokenizer\CharAnalyzer\Model;

class ModelTest extends \PHPUnit_Framework_TestCase
{
    private $model;

    public function setUp()
    {
        $this->model = new Model('text', 2);
    }

    public function testGetters()
    {
        $this->assertEquals('text', $this->model->getText());
        $this->assertEquals(2, $this->model->getCharPos());
        $this->assertEquals('x', $this->model->getCurrentChar());
        $this->assertEquals('t', $this->model->getNextChar());
        $this->assertEquals('e', $this->model->getPrevChar());
    }
}
