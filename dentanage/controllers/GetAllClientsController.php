<?php
namespace App\Controllers;

use App\Models\Clients;

class GetAllClientsController
{
    private Clients $_clients;

    public function __construct(Clients $clients)
    {
        $this->_clients = $clients;
    }

    public function exec(): void
    {
        $result = $this->_clients->find_all();
        $clients = array_map(
            function ($client): array {
                return [
                    "id" => $client[0],
                    "name" => $client[1],
                    "surname" => $client[2],
                    "dni" => $client[3],
                    "birhtdate" => $client[4],
                ];
            },
            $result
        );
        echo json_encode($clients, JSON_PRETTY_PRINT);
    }
}
