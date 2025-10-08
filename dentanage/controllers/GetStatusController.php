<?php
namespace App\Controllers;

use App\Models\Dentist;

class GetStatusController
{
    public function exec()
    {
        echo json_encode([
            "status" => "ok",
            "ping" => "pong"
        ]);
    }
}
