<?php

namespace Tests;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\Http;
use Illuminate\Testing\TestResponse;


trait HttpRequests {

    public function call( $method , $uri , $parameters = [ ] , $cookies = [ ] , $files = [ ] , $server = [ ] , $content = '{}' ) : TestResponse {
        $Response = Http::withHeaders ( $server ) -> $method ( $this -> currentUri = $this -> prepareUrlForRequest( $uri ) , json_decode( $content , true ) + $parameters ) ;
        return $this -> response = TestResponse::fromBaseResponse( new Response( $Response -> json( ) , $Response -> status( ) , $Response -> headers( ) ) ) ;
    }

}