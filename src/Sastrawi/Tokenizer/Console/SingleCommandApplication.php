<?php

namespace Sastrawi\Tokenizer\Console;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Sastrawi\Tokenizer\TokenizerFactory;

class SingleCommandApplication extends Application
{
    protected function getCommandName(InputInterface $input)
    {
        return 'tokenize';
    }

    protected function getDefaultCommands()
    {
        // Keep the core default commands to have the HelpCommand
        // which is used when using the --help option
        $defaultCommands = parent::getDefaultCommands();

        $tokenizerFactory  = new TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();
        $defaultCommands[] = new TokenizeCommand($tokenizer);

        return $defaultCommands;
    }

    public function getDefinition()
    {
        $inputDefinition = parent::getDefinition();
        $inputDefinition->setArguments();

        return $inputDefinition;
    }
}
