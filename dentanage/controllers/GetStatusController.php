<?php
namespace App\Controllers;

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
