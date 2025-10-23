<?php
namespace App\Models;

class Dentist {
    private \mysqli $_client;
    public function __construct(\mysqli $_client) {
        $this->_client = $_client;
    }

    public function find_all(): array {
        $stmt = $this->_client->query("SELECT * FROM dentists");
        $dentists = $stmt->fetch_all();

        return $dentists;
    }

    public function delete (int $id): bool {
        $stmt = $this->_client->prepare("DELETE FROM dentists WHERE dentist_id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function find_by_dni (string $dni): bool|array {
        $stmt = $this->_client->prepare("SELECT * FROM dentists WHERE dentists.dentist_dni = ?");
        $stmt->bind_param("s", $dni);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->num_rows > 0 ? $result->fetch_all() : false;
    }

    public function exist (string $dni): bool {
        $stmt = $this->_client->prepare("SELECT * FROM dentists WHERE dentists.dentist_dni = ?");
        $stmt->bind_param("s", $dni);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function create (string $name, string $surname, string $dni, string $date_of_birth, int $dentist_on_vacation): bool {
        $stmt = $this->_client->prepare("INSERT INTO dentists (dentist_name, dentist_surname, dentist_dni, dentist_date_of_birth, dentist_on_vacation) VALUES(?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $name, $surname, $dni, $date_of_birth, $dentist_on_vacation);
        return $stmt->execute();
    }

    public function update (int $id, array $data) {
        $fields = array_keys($data);
        $fields = array_map(fn($key) => $key. " = ?", $fields);
        $values = array_values($data);
        $types = "";

        foreach ($values as $value) {
            if (is_int($value)) $types .= "i";
            else $types .= "s";
        }

        $types .= "i";
        array_push($values, $id);

        $stmt = $this->_client->prepare("UPDATE dentists SET ". implode(", ", $fields). " WHERE dentist_id = ?");
        $stmt->bind_param($types, ...$values);
        $stmt->execute();

        $stmt->close();
    }
}


