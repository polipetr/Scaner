<?php
namespace Scaner\Configuration;

class ServersConfiguration {
    
    public static function getServerConfig()
    {
       $serverList = file_get_contents(__DIR__ . '\list.json');
       return json_decode($serverList);          
    }
    
}



