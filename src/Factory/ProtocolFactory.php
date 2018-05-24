<?php

namespace Scaner\Factory;

use Scaner\Protocols;
use Exception;

class ProtocolFactory {
 
    private function __construct() 
    {
        
    }
    
    public static function selectProtocol(string $server, int $port)
    {
        if (in_array($port, [80, 443])) {
           return new Protocols\HTTP($server, $port);
        }
        
        if (in_array($port, [25, 587])) {
           return new Protocols\SMTP($server, $port);
        }
               
        throw new Exception("Invalid port number");
        
    }    
    
}



