<?php

namespace SastrawiTest\Tokenizer\Console;

use Sastrawi\Tokenizer\Console\TokenizeCommand;
use Sastrawi\Tokenizer\TokenizerFactory;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class TokenizeCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecute()
    {
        $application = new Application();

        $tokenizerFactory = new TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();
        $application->add(new TokenizeCommand($tokenizer));

        $fp = fopen('php://memory', 'rw');
        fwrite($fp, 'Saya belajar NLP.');
        fseek($fp, 0);

        $command = $application->find('tokenize');
        $command->setInputStream($fp);
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));

        $this->assertEquals("Saya belajar NLP .", $commandTester->getDisplay());
    }
}
