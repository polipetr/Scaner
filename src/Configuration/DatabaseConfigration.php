<?php
namespace Scaner\Configuration;

class DatabaseConfigration {
    
    const NAME = 'root';
    const HOST = 'localhsot';
    const PASSWORD = '';
    
    //Get from config
    public static function getName()
    {
        return self::NAME;       
    }
    
    //Get from config
    public function getPasswrod()
    {
        return self::PASSWORD;       
    }
    
    //Get from config
    public function getHost()
    {
        return self::PASSWORD;      
    }
    
}



