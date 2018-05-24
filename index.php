<?php

require 'vendor/autoload.php';

use Scaner\Factory;
use Scaner\Configuration;

$config = \Scaner\Configuration\ServersConfiguration::getServerConfig();
$databaseConfig = new Configuration\DatabaseConfigration();
$connection = mysqli_connect
(
    $databaseConfig->getHost(),
    $databaseConfig->getName(),
    $databaseConfig->getPasswrod(),
    "scaner"
);
$report = new Scaner\Model\Report($connection);


foreach ($config->servers as $server) {
    
    foreach ($config->ports as $port) {
        try {
            $protocolFactory = Factory\ProtocolFactory::selectProtocol($server, $port);
        }
        catch(Exception $e) {
           echo 'Message: ' .$e->getMessage() . PHP_EOL;        
        }
        $ip = gethostbyname($protocolFactory->getServer());        
        $connection = @fsockopen(
            $protocolFactory->getServer(),
            $protocolFactory->getPort(),
            $errno,
            $errstr, 
            2
        );
        
        if (is_resource($connection)) {
            fwrite($connection, "{$protocolFactory->sendMessage()}\r\n");
            while (!feof($connection)) {
                $response[] = fgets($connection, 4096);
            }
            fclose($connection);
            continue;
        }
        $report->saveData($ip, $protocolFactory->getPort(), 'Not respoding');
        echo '<h2>' . $protocolFactory->getServer() . ':' .
            $protocolFactory->getPort() . ' is not responding.</h2>' . "\n";
    }
           
}








