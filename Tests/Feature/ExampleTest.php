<?php

namespace Tests\Feature;

use Tests\TestCase ;

class ExampleTest extends TestCase {

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example( ) : void {

        $body    = [ 'mahmoud' => 'harby' ] ;
        $headers = [ 'headers' => 'king'  ] ;

        $response = $this -> json( 'GET' , 'testEndPointPath' , $body , $headers ) -> response ;

        $this -> assertEquals( 200                , $response -> getStatusCode       (                ) ) ;

        $this -> assertEquals( 'application/json' , $response -> headers       -> get( 'Content-Type' ) ) ;

        $this -> assertEquals( 'GuzzleHttp/7'     , $response -> headers       -> get( 'user-agent'   ) ) ;

        dd(
            $this -> json( 'GET'     , 'testEndPointPath' , $body , $headers ) -> response -> json( ) ,
            $this -> json( 'POST'    , 'testEndPointPath' , $body , $headers ) -> response -> json( ) ,
            $this -> json( 'PUT'     , 'testEndPointPath' , $body , $headers ) -> response -> json( ) ,
            $this -> json( 'PATCH'   , 'testEndPointPath' , $body , $headers ) -> response -> json( ) ,
            $this -> json( 'PATCH'   , 'testEndPointPath' , $body , $headers ) -> response -> json( ) ,
            $this -> json( 'DELETE'  , 'testEndPointPath' , $body , $headers ) -> response -> json( ) ,
        );

    }

}