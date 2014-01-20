<?php

//namespace Acme\DemoBundle\Features\Context;

use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\Step\When;

use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Executor\MongoDBExecutor;
use Doctrine\Common\DataFixtures\Purger\MongoDBPurger;

require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

/**
 * Feature context.
 */
class FeatureContext extends MinkContext
{
    public function __construct()
    {
        //$this->useContext('demo', new DemoContext());
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
}
