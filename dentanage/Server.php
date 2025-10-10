<?php
namespace App;

require_once __DIR__ . "/database/MysqlClientFactory.php";
require_once __DIR__ . "/models/Dentists.php";
require_once __DIR__ . "/controllers/GetAllDentistsController.php";
require_once __DIR__ . "/controllers/GetStatusController.php";
require_once __DIR__ . "/controllers/GetAllClientsController.php";
require_once __DIR__ . "/controllers/CreateDentistController.php";
require_once __DIR__ . "/controllers/CreateClientController.php";
require_once __DIR__ . "/controllers/UpdateDentistControler.php";
require_once __DIR__ . "/models/Clients.php";

use App\Controllers\CreateClientController;
use App\Controllers\GetAllClientsController;
use App\Controllers\GetStatusController;
use App\Database\MysqlClientFactory;
use App\Database\UpdateDentistsController;
use App\Models\Clients;
use App\Models\Dentist;
use App\Controllers\GetAllDentistsController;
use App\Controllers\CreateDentistController;

class Server
{
    // Database client
    private MysqlClientFactory $_conn;


    //Models
    private Dentist $_dentist;
    private Clients $_client;

    // Controllers
    private GetAllDentistsController $get_all_dentists;
    private GetStatusController $get_status_controller;
    private GetAllClientsController $get_clients_controller;
    private CreateDentistController $create_dentist_controller;
    private CreateClientController $create_client_controller;
    private UpdateDentistsController $update_dentist_controller;

    public function __construct()
    {
        // client
        $this->_conn = new MysqlClientFactory();

        // models
        $this->_dentist = new Dentist($this->_conn->get_connection());
        $this->_client = new Clients($this->_conn->get_connection());

        // controllers
        $this->get_all_dentists = new GetAllDentistsController($this->_dentist);
        $this->get_status_controller = new GetStatusController();
        $this->get_clients_controller = new GetAllClientsController($this->_client);
        $this->create_dentist_controller = new CreateDentistController($this->_dentist);
        $this->create_client_controller = new CreateClientController($this->_client);
        $this->update_dentist_controller = new UpdateDentistsController($this->_dentist);
    }

    public function process_request()
    {
        header("Content-Type: application/json");

        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $method = $_SERVER["REQUEST_METHOD"];

        if ($uri === "/status" && $method === "GET") {
            http_response_code(200);
            $this->get_status_controller->exec();
        } else if ($uri === "/dentists" && $method === "GET") {
            http_response_code(200);
            $this->get_all_dentists->exec();
        } else if ($uri === "/clients" && $method === "GET") {
            http_response_code(200);
            $this->get_clients_controller->exec();
        } else if ($uri === "/dentists" && $method === "POST") {
            http_response_code(201);
            $this->create_dentist_controller->exec();
        } else if ($uri === "/clients" && $method === "POST") {
            http_response_code(201);
            $this->create_client_controller->exec();
        } else if (preg_match("#^/dentists/(\d+)$#", $uri, $matches) && $method === "PUT") {
            http_response_code(201);
            $this->update_dentist_controller->exec(intval($matches[1]));
        } else {
            header("Content-Type: text/plain");
            http_response_code(404);
            echo "Error on " . $uri;
        }
    }
}
