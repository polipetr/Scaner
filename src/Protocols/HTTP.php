<?php

namespace Scaner\Protocols;

class HTTP extends ProtocolAbstract  {
    
   const HTML_CODE = 'H12';
   
           
   public function sendMessage()
   {
       return self::HTML_CODE . "\r\n";
   }
   
   public function validateMessage() {
       //HTML validation
   }
                  
}

