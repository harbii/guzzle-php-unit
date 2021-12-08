<?php

namespace Tests\Feature;

use Tests\TestCase ;

class ExampleTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example( ) {
        $response = $this -> json( 'GET' , 'user-agent' );
    
        $this -> assertEquals( 200 , $response -> getStatusCode( ) ) ;
    
        $contentType = $response -> getHeaders( )[ 'Content-Type' ][ 0 ];
        $this -> assertEquals( 'application/json' , $contentType );
    
        $userAgent = json_decode( $response -> getBody( ) ) -> { 'user-agent' };
        $this->assertTrue(true);

    }

}