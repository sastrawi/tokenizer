<?php

namespace SastrawiTest\Tokenizer;

use Sastrawi\Tokenizer\TokenizerFactory;

class TokenizerFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateDefaultTokenizer()
    {
        $factory = new TokenizerFactory();
        $this->assertInstanceOf('Sastrawi\Tokenizer\DefaultTokenizer', $factory->createDefaultTokenizer());
    }
}
