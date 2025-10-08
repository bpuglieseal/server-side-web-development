<?php
namespace App\Controllers;

use App\Models\Clients;

class CreateClientController
{
    private Clients $_clients;

    public function __construct(Clients $client)
    {
        $this->_clients = $client;
    }

    public function exec(): void
    {
        $json = file_get_contents("php://input");
        $body = json_decode($json, true);

        // Body
        $dni = $body["dni"];
        $name = $body["name"];
        $surname = $body["surname"];
        $birth_date = $body["birthdate"];

        if ($this->_clients->exist($dni)) {
            http_response_code(400);
            echo json_encode(["message" => "Client with dni " . $dni . " already exists"]);
        } else {
            $result = $this->_clients->create($dni, $name, $surname, $birth_date);
            if ($result) {
                echo json_encode(["message" => "New client created"]);
            } else {
                echo json_encode(["message" => "Error on create client"]);
            }
        }
    }
}
