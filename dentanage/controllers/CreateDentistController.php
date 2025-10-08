<?php
namespace App\Controllers;

use App\Models\Dentist;

class CreateDentistController
{
    private Dentist $_dentist;

    public function __construct(Dentist $dentist)
    {
        $this->_dentist = $dentist;
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
        $on_vacation = $body["onVacation"];

        if ($this->_dentist->exist($dni)) {
            http_response_code(400);
            echo json_encode(["message" => "Dentist with dni " . $dni . " already exists"]);
        } else {
            $result = $this->_dentist->create($name, $surname, $dni, $birth_date, $on_vacation);
            if ($result) {
                echo json_encode(["message" => "New dentist created"]);
            } else {
                echo json_encode(["message" => "Error on create dentist"]);
            }
        }
    }
}
