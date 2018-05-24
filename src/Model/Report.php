<?php

namespace Scaner\Model;

class Report {
   
    private $connection;

    public function __construct($connection) 
    {  
        $this->connection = $connection;  
    }

    public function saveData($ip, $port, $reason)
    {
       $stmt = $this->connection->prepare("INSERT INTO server_data (ip, port, reason, date)
            VALUES (?, ?, ?, NOW())");
       $stmt->bind_param("sss", $ip, $port, $reason);
       $stmt->execute();
    }
}
