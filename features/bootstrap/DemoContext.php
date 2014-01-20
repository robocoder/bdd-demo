<?php

//namespace Acme\DemoBundle\Features\Context;

use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\Behat\Event\StepEvent;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Behat\Context\RegexAcceptingContext;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 *
 */
class DemoContext extends MinkContext implements RegexAcceptingContext
{
    /**
     *
     */
    public function hasClass($elem, $class)
    {
        $classes = $elem->getAttribute('class');
        $classes = explode(' ', $classes);

        return in_array($class, $classes);
    }

    /**
     * @Given /^the Color Select should have colors:$/
     */
    public function assertColors(TableNode $table)
    {
        $page = $this->getSession()->getPage();

        // get the expected colors
        $exp_colors = array();
        foreach($table->getHash() as $option) {
            $exp_colors[] = $option['value'];
        }

        // get the select menu element
        $select_elem = $page->find('css', '#color-select');
        if (!$select_elem) throw new \Exception('Could not find Color Select');

        // pluck the actual values from the select menu
        $act_colors = array();
        $options = $select_elem->findAll('css', 'option');
        foreach ($options as $option) {
            $color = $option->getText();
            $act_colors[] = $color;
        }

        // compare exp vs act
        assertEquals($exp_colors, $act_colors);

    }

    /**
     * @Then /^The Box should be color "([^"]*)"$/
     */
    public function assertColor($color)
    {
        $page = $this->getSession()->getPage();

        $box = $page->find('css', '#box');
        if (!$box) throw new \Exception('The box was not found');

        assertTrue($this->hasClass($box, $color));

    }

    /**
     * @Given /^The Box should not be color "([^"]*)"$/
     */
    public function assertNotcolor($color)
    {
        $page = $this->getSession()->getPage();

        $box = $page->find('css', '#box');
        if (!$box) throw new \Exception('The box was not found');

        assertFalse($this->hasClass($box, $color), "Should be color {$color}");

    }
}
