<?php

header("Access-Control-Allow-Origin: *"); //может быть прочитан кем угодно
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/connect_db.php';
include_once '../../objects/Note.php';

$database = new Database();
$db = $database->getConnection();

$note = new Note($db);

$stmt = $note->read();
$num = $stmt->rowCount();

if($num > 0)
{
    $notes = [];
    $notes["records"] = [];
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row); //преобразует ассоциативный массив в кучу переменных со значениями
    
        $item = [
            "id" => $id,
            "title" => $title,
            "description" => html_entity_decode($description),
            "img" => $img,
            "mark" => $mark,
            "created"=> $created,
            "author" => $author
        ];
    
        array_push($notes["records"], $item);
    }
    
    http_response_code(200);

    echo json_encode($notes);
}
else
{
    http_response_code(404);

    echo json_encode(
            array("message" => "notes not found")
    );
}




