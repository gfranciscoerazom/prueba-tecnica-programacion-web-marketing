<?php

namespace Database\MySQLi;

class Connection
{
    private static $instance;
    private $connection;

    private function __construct()
    {
        $this->make_connection();
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function get_database_instance()
    {
        return $this->connection;
    }

    private function make_connection()
    {
        $server = "localhost";
        $database = "prueba_tecnica_programacion_web_marketing";
        $username = "root";
        $password = "";

        $mysqli = new \mysqli($server, $username, $password, $database);

        if ($mysqli->connect_errno) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $setnames = $mysqli->prepare("SET NAMES 'utf8'");
        $setnames->execute();

        $this->connection = $mysqli;
    }
}
