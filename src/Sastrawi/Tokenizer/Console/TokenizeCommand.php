<?php

namespace Sastrawi\Tokenizer\Console;

use Sastrawi\Tokenizer\TokenizerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TokenizeCommand extends Command
{
    private $tokenizer;

    private $availableOutputFormats = array('plain', 'json');

    private $delimiter = ' ';

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
             ->setDescription('Tokenize text in Bahasa Indonesia. It reads text from STDIN then write tokens to STDOUT')
             ->addOption(
                 'output-format',
                 null,
                 InputOption::VALUE_REQUIRED,
                 'Currently available format: '.implode(', ', $this->availableOutputFormats).'.',
                 'plain'
             )
             ->addOption(
                 'delimiter',
                 null,
                 InputOption::VALUE_REQUIRED,
                 'Token delimiter. This option is available only in plain output format.',
                 ' '
             );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $outputFormat = $input->getOption('output-format');
        $this->delimiter = $input->getOption('delimiter');
        $this->validateOutputFormat($outputFormat);

        $inputText = '';
        while (($buffer = fgets($this->inputStream, 4096)) !== false) {
            $inputText .= $buffer;
        }

        $tokens = $this->tokenizer->tokenize($inputText);

        $output->write($this->formatOutput($tokens, $outputFormat));
    }

    protected function validateOutputFormat($format)
    {
        if (!in_array($format, $this->availableOutputFormats)) {
            throw new \Exception(
                'Output format you choose is not available. Currently supported output format: '
                .implode(', ', $this->availableOutputFormats).'.'
            );
        }
    }

    protected function formatOutput(array $tokens, $outputFormat = 'plain')
    {
        if ($outputFormat === 'plain') {
            return implode($this->delimiter, $tokens);
        } elseif ($outputFormat === 'json') {
            return json_encode($tokens);
        }
    }

    public function getSynopsis()
    {
        return parent::getSynopsis()."\n\n<comment>Description:</comment>\n ".$this->getDescription();
    }
}
