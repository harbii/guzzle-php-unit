<?php

namespace Tests;

use GuzzleHttp\Client;

trait HttpRequests {

    public $http ;

	public static bool $wasSetup = false ;

	protected function setUp( ) : void {
		parent::setUp( );
		if ( ! static::$wasSetup ) {
			$this -> http = new Client( [ 'base_uri' => 'https://httpbin.org/' ] );
		}
	}

    public function tearDown( ) : void {
        $this->http = null;
    }

    /**
     * Visit the given URI with a JSON request.
     *
     * @param  string  $method
     * @param  string  $uri
     * @param  array  $data
     * @param  array  $headers
     * @return $this
     */
    public function json($method, $uri, array $data = [], array $headers = []) {
        $content = json_encode($data);

        $headers = array_merge([
            'CONTENT_LENGTH' => mb_strlen($content, '8bit'            ),
            'CONTENT_TYPE'   =>                     'application/json' ,
            'Accept'         =>                     'application/json' ,
        ], $headers );

        $request = $this -> http -> request( $method, $uri, [
			'headers' => $this -> transformHeadersToServerVars( $headers ) ,
			'body'    => $content ,
		] ) ;

        return $request ;
    }

    /**
     * Transform headers array to array of $_SERVER vars with HTTP_* format.
     *
     * @param  array  $headers
     * @return array
     */
    protected function transformHeadersToServerVars( array $headers , string $prefix = 'HTTP_' , array $server = [ ] ) {
        foreach ( $headers as $name => $value ) {
            $name = strtr( strtoupper( $name ) , '-' , '_' );
            if ( ! str_starts_with( $name , $prefix ) && $name != 'CONTENT_TYPE' ) $name = $prefix.$name ;
            $server[ $name ] = $value;
        }
        return $server;
    }

}
