<?php
namespace App\Models;

class Clients {
    private \mysqli $_client;

    public function __construct(\mysqli $client) {
        $this->_client = $client;
    }

    public function exist (string $dni): bool {
        $stmt = $this->_client->prepare("SELECT * FROM clients WHERE clients.client_dni = ?");
        $stmt->bind_param("s", $dni);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function find_all(): array {
        $stmt = $this->_client->query("SELECT * FROM clients");
        $clients = $stmt->fetch_all();

        return $clients;
    }
}
