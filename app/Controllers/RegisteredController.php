<?php

namespace App\Controllers;

use Database\MySQLi\Connection;

class RegisteredController
{
    private $connection;
    public function __construct()
    {
        $this->connection = Connection::getInstance()->get_database_instance();
    }

    // Método para saber cuántas personas están registradas
    public function count_of_registered()
    {
        $count = 0;
        $stmt = $this->connection->prepare("SELECT COUNT(*) FROM registered");
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        return $count;
    }
    public function store($data)
    {
        $stmt = $this->connection->prepare("INSERT INTO registered (
            name,
            lastname,
            phone,
            email,
            consent
        )
        VALUES (?, ?, ?, ?, ?)");

        $name = $data['name'];
        $lastname = $data['lastname'];
        $phone = $data['phone'];
        $email = $data['email'];
        $consent = $data['consent'];

        $stmt->bind_param("sssss", $name, $lastname, $phone, $email, $consent);
        $stmt->execute();
    }
}
