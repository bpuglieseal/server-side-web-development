<?php
namespace App\Database;

require_once __DIR__ . "/MysqlClientFactory.php";

use App\Database\MysqlClientFactory;

class Seeder
{
    private $_client;

    public function __construct(\mysqli $_client)
    {
        $this->_client = $_client;
    }

    public function run(): void
    {
        echo "Ejecutando seeder...⏳ ". PHP_EOL;

        echo "Insertando dentistas...⏳ ";
        $dentists = [
            ['Laura', 'Gómez', '12345678A', '1980-04-12', 0],
            ['Carlos', 'Pérez', '23456789B', '1975-09-25', 1],
            ['María', 'Fernández', '34567890C', '1990-01-15', 0],
            ['Jorge', 'Ruiz', '45678901D', '1988-07-09', 1],
            ['Lucía', 'Martínez', '56789012E', '1982-12-03', 0]
        ];

        foreach ($dentists as $dentist) {
            $stmt = $this->_client->prepare("INSERT INTO dentists (dentist_name, dentist_surname, dentist_dni, dentist_date_of_birth, dentist_on_vacation) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $dentist[0], $dentist[1], $dentist[2], $dentist[3], $dentist[4]);
            if (!$stmt->execute()) {
                echo "Error insertando el dentista " . $dentist[0] . ": " . $stmt->error;
            }
            $stmt->close();
        }

        echo "Dentistas insertados. ✅" . PHP_EOL;

        echo "Insertando clientes... ⏳";
        $clients = [
            ['Juan', 'Pérez', '12345678A', '1990-05-14'],
            ['María', 'González', '87654321B', '1985-11-02'],
            ['Carlos', 'López', '11223344C', '1992-03-23'],
            ['Laura', 'Martínez', '55667788D', '1998-07-30'],
            ['Andrés', 'Fernández', '99887766E', '2000-12-15']
        ];

        foreach ($clients as $client) {
            $stmt = $this->_client->prepare("INSERT INTO clients (client_name, client_surname, client_dni, client_date_of_birth) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $client[0], $client[1], $client[2], $client[3]);
            if (!$stmt->execute()) {
                echo "Error insertando el client " . $client[0] . ": " . $stmt->error;
            }
        }

        echo " Clientes insertados. ✅" . PHP_EOL;

        echo "Seeder ejecutado correctamente. ✅". PHP_EOL;
    }
}


$_mysqli = new MysqlClientFactory();
$seed = new Seeder($_mysqli->get_connection());
$seed->run();
