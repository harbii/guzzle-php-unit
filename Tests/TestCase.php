<?php

namespace Tests;

use Laravel\Lumen\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase {

	use HttpRequests ;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = BASE_URI ;

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication( ) {
        return require __DIR__ . '/../App/Bootstrap/App.php' ;
    }

}