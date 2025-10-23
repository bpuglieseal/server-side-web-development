<?php
namespace App\Controllers;

use App\Models\Dentist;

class DeleteDentistController
{
    private Dentist $_dentists;

    public function __construct(Dentist $dentists)
    {
        $this->_dentists = $dentists;
    }

    public function exec(int $id): void
    {
        $this->_dentists->delete($id);
        echo json_encode([
            "message" => "Dentist with id " . $id . " deleted"
        ]);
    }
}
