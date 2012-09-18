<?php

namespace Acme\DemoBundle\Features\Context;

use Behat\BehatBundle\Context\MinkContext as BaseMinkContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

/**
 * 
 */
class MinkContext extends BaseMinkContext
{
  
    /**
     *
     * @param type $kernel 
     */
    public function __construct($kernel) 
    {
        parent::__construct($kernel);    
    }
  
}