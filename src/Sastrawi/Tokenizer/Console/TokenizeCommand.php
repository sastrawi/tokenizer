<?php

namespace Sastrawi\Tokenizer\Console;

use Sastrawi\Tokenizer\TokenizerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TokenizeCommand extends Command
{
    private $tokenizer;

    public function __construct(TokenizerInterface $tokenizer)
    {
        parent::__construct();
        $this->inputStream = \STDIN;
        $this->tokenizer   = $tokenizer;
    }

    public function setInputStream($inputStream)
    {
        $this->inputStream = $inputStream;
    }

    public function getInputStream()
    {
        return $this->inputStream;
    }

    public function setTokenizer(TokenizerInterface $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    public function getTokenizer()
    {
        return $this->tokenizer;
    }

    protected function configure()
    {
        $this->setName('tokenize')
             ->setDescription('Tokenize text in Bahasa Indonesia');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inputText = '';
        while (($buffer = fgets($this->inputStream, 4096)) !== false) {
            $inputText .= $buffer;
        }

        $delimiter = ' ';

        $output->write(implode($delimiter, $this->tokenizer->tokenize($inputText)));
    }
}
