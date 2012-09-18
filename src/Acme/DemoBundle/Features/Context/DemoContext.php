<?php

namespace Acme\DemoBundle\Features\Context;

use Behat\BehatBundle\Context\BehatContext;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\BehatBundle\Context\MinkContext as BaseMinkContext;
use Behat\Behat\Event\StepEvent;


/**
 * 
 */
class DemoContext extends BehatContext 
{ 
    /**
     *
     * @param type $kernel 
     */
    public function __construct($kernel) 
    {
        parent::__construct($kernel);
    }

    public function getSession($name = null) 
    {
        return $this->getMainContext()->getSubcontext('mink')->getSession($name);
    }

    public function main() 
    {
        return $this->getMainContext();
    }
    
}
