<?php

namespace SastrawiTest\Tokenizer\Console;

use Sastrawi\Tokenizer\Console\TokenizeCommand;
use Sastrawi\Tokenizer\TokenizerFactory;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class TokenizeCommandTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->application = new Application();

        $tokenizerFactory = new TokenizerFactory();
        $this->tokenizer = $tokenizerFactory->createDefaultTokenizer();
        $this->application->add(new TokenizeCommand($this->tokenizer));

        $fp = fopen('php://memory', 'rw');
        fwrite($fp, 'Saya belajar NLP.');
        fseek($fp, 0);

        $this->command = $this->application->find('tokenize');
        $this->command->setInputStream($fp);
        $this->commandTester = new CommandTester($this->command);
    }

    public function testExecute()
    {
        $this->commandTester->execute(array('command' => $this->command->getName()));
        $this->assertEquals("Saya belajar NLP .", $this->commandTester->getDisplay());
    }

    public function testExecuteOutputFormatJson()
    {
        $this->commandTester->execute(array('command' => $this->command->getName(), '--output-format' => 'json'));
        $this->assertEquals('["Saya","belajar","NLP","."]', $this->commandTester->getDisplay());
    }

    public function testExecuteOptionDelimiter()
    {
        $this->commandTester->execute(array('command' => $this->command->getName(), '--delimiter' => ','));
        $this->assertEquals("Saya,belajar,NLP,.", $this->commandTester->getDisplay());
    }
}
