<?php
require_once __DIR__ . "/Server.php";

use App\Server;

$server = new Server();
$server->process_request();
