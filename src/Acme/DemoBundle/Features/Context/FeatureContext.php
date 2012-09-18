<?php

namespace Acme\DemoBundle\Features\Context;

use Behat\BehatBundle\Context\BehatContext;

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Exception\PendingException;

use Behat\Behat\Event\SuiteEvent,
    Behat\Behat\Event\ScenarioEvent;

use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\Mink\Exception\ElementNotFoundException;

use Behat\Behat\Context\Step\When;

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\MongoDBExecutor;
use Doctrine\Common\DataFixtures\Purger\MongoDBPurger;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';


/**
 * Feature context.
 */
class FeatureContext extends BehatContext 
{
    public function __construct($kernel) 
    {
        parent::__construct($kernel);

        $this->useContext('mink', new MinkContext($kernel));            
    }
                  
    /**
     *
     * @return type 
     */
    public function getDocumentManager()
    {
        return $this->getContainer()->get('doctrine.odm.mongodb.document_manager');       
    }
    
    /**
     * Alias of getDocumentManager()
     * 
     * @return type 
     */
    public function getDm()
    {
        return $this->getDocumentManager();
    }
    
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
     *
     * @param string $name
     */
    public function getSession($name = null) 
    {
        return $this->getSubcontext('mink')->getSession($name);
    }
    
    
         
}
