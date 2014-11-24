<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Sastrawi\Tokenizer\TokenizerFactory;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    private $text;

    private $tokens = array();

    private $tokenizer;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->tokenizer = TokenizerFactory::createDefaultTokenizer();
    }

    /**
     * @Given The following text:
     */
    public function theFollowingText(PyStringNode $string)
    {
        $this->text = (string) $string;
    }

    /**
     * @When I tokenize it
     */
    public function iTokenizeIt()
    {
        $this->tokens = $this->tokenizer->tokenize($this->text);
    }

    /**
     * @Then I should get the following tokens:
     */
    public function iShouldGetTheFollowingTokens(PyStringNode $string)
    {
        \PHPUnit_Framework_Assert::assertEquals((string) $string, implode(' ', $this->tokens));
    }
}
