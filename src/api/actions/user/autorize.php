<?php

header("Access-Control-Allow-Origin: http://localhost:8080"); //может быть прочитан кем угодно
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Request-Headers: content-type,contenttype");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// generate json web token
include_once '../../config/core.php';
include_once '../../libs/php-jwt-master/src/BeforeValidException.php';
include_once '../../libs/php-jwt-master/src/ExpiredException.php';
include_once '../../libs/php-jwt-master/src/SignatureInvalidException.php';
include_once '../../libs/php-jwt-master/src/JWT.php';
use \Firebase\JWT\JWT;

include_once("../../objects/User.php");
include_once("../../config/connect_db.php");


$db = new Database();

$database = $db->getConnection();
$user = new User($database);

$inputsData = json_decode(file_get_contents("php://input"), true);
$user->email = $inputsData['email'];
$stmt = $user->signIn();
$num = $stmt->rowCount();
if($num < 0)
{
    echo "Такой пользователь не найден";
    http_response_code(400);
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);
extract($row);

if (password_verify($inputsData['password'], $row['password']))//ПРИДИ И НАПИШИ validate_token.php
{
    $token = [
        "iss" => $iss,
        "aud" => $aud,
        "iat" => $iat,
        "nbf" => $nbf,
        "data" => [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "dream" => $dream,
            "achievements" => $achievements,
            "coins" => $coins,
            "email" => $user->email
            ]
        ];

    http_response_code(200);
    $jwt = JWT::encode($token, $key);
    echo json_encode(array("message" => "success", "jwt" => $jwt, "user" => $token["data"]));
}
else
{
    http_response_code(401);
    echo json_encode(array("message" => "fault"));
}
