<?php
namespace App\Database;
class MysqlClientFactory
{
    private $_connection;

    function __construct()
    {
        $server = "0.0.0.0";
        $database = "dentanage";
        $username = "root";
        $password = "root";

        $this->_connection = new \mysqli($server, $username, $password, $database);
        if ($this->_connection->connect_error) {
            die("Error de conexion". $this->_connection->connect_error);
        }
    }

    public function get_connection(): \mysqli {
        return $this->_connection;
    }
}
