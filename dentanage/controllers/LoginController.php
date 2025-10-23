<?php
namespace App\Controllers;

class LoginController
{
    public function exec()
    {
        $json = file_get_contents("php://input");
        $body = json_decode($json, true);

        // Body
        $email = $body["email"];
        $password = $body["password"];

        if ($email === "admin@email.com" && $password === "admin") {
            $_SESSION["logged_in"] = true;
            $_SESSION["user"] = ["email" => $email, "role" => "admin"];
            echo json_encode(["message" => "Login successful", "user" => $_SESSION["user"] ]);
            return;
        } else {{
            http_response_code(401);
            echo json_encode(["message" => "Invalid credentials"]);
            return;
        }}
    }
}
