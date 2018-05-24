<?php

namespace Scaner\Protocols;

class SMTP extends ProtocolAbstract  {
    
   const SMTP_CODE = 'S12';
           
   public function sendMessage()
   {
       return self::SMTP_CODE . "\r\n";
   }
   
   public function validateMessage() {
       //SMTP validation
   }
                
}

