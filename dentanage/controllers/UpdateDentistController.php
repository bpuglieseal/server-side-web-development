<?php
namespace App\Controllers;

use App\Models\Dentist;

class UpdateDentistsController
{
    private Dentist $_dentists;

    public function __construct(Dentist $dentists)
    {
        $this->_dentists = $dentists;
    }

    public function exec(int $id): void
    {
        $json = file_get_contents("php://input");
        $body = json_decode($json, true);

        $data = array();
        foreach ($body as $key => $value) {
            $data[$key] = $value;
        }

        $this->_dentists->update($id, $data);
        echo json_encode([
            "message" => "Dentist with id " . $id . " updated"
        ]);
    }
}
