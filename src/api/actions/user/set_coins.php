<?php
header("Access-Control-Allow-Origin: *"); //может быть прочитан кем угодно
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
$user->email = $data['email'];
$stmt = $user->signIn();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

$user->coins = $data['coins'] + $coins;
$user->firstname = $data['firstname'];
$user->email = $email;
if ($user->setCoins())
{
    $user->setCoins();

    http_response_code(200);

    echo json_encode(array(
        "message" => "success",
        "coins" => $user->coins,
        "firstname" => $user->firstname
    ));
}
else
{
    http_response_code(400);

    echo json_encode(array(
        "message" => "fault"
    ));
}

