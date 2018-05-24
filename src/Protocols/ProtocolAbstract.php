<?php

namespace Scaner\Protocols;

abstract class ProtocolAbstract {
   
    protected $port;
    protected $server;

   public function __construct($server, $port) 
   { 
       $this->server = $server;
       $this->port = $port;
   } 
    
   public function getPort()
   {
       return $this->port;
   }
    
   public function getServer()
   {
      return $this->server;       
   }
   
   public function sendMessage()
   {
       return 'some message';
   }
   
   public function validateMessage()
   {
       //Validation
   }
   
}


