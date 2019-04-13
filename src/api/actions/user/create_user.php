<?php

header("Access-Control-Allow-Origin: http://localhost:8080"); //может быть прочитан кем угодно
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Request-Headers: content-type,contenttype");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once("../../objects/User.php");
include_once("../../config/connect_db.php");


$db = new Database();

$database = $db->getConnection();
$user = new User($database);



$data = json_decode(file_get_contents("php://input"), true);
$user->firstname = htmlspecialchars(strip_tags($data['firstname']));
$user->lastname = htmlspecialchars(strip_tags($data['lastname']));
$user->email = htmlspecialchars(strip_tags($data['email']));

$user->password=htmlspecialchars(strip_tags($data['password']));
$user->password = password_hash($data['password'], PASSWORD_BCRYPT);

$user->create();

if ($user->create())
{
    http_response_code(200);
    echo json_encode(array(
        "message" => "success"
    ));
}
else
{
    http_response_code(401);
    echo json_encode(array(
        "message" => "fault"
    ));
}




