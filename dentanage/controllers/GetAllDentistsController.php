<?php
namespace App\Controllers;

use App\Models\Dentist;

class GetAllDentistsController
{
    private Dentist $_model;
    public function __construct(Dentist $model)
    {
        $this->_model = $model;
    }

    public function exec()
    {
        $result = $this->_model->find_all();
        $dentists = array_map(
            function ($dentist) {
                return [
                    "id" => $dentist[0],
                    "name" => $dentist[1],
                    "surname" => $dentist[2],
                    "dni" => $dentist[3],
                    "birthDate" => $dentist[4],
                    "onVacations" => $dentist[5]
                ];
            },
            $result
        );
        echo json_encode($dentists, JSON_PRETTY_PRINT);
    }
}
