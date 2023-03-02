<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type");

require_once "../connect.php";
require_once "../response.php";

$response = new Response();

$params = array(
    'id' => $_GET['id'],
    'room' => $_GET['room'],
);

$sql = "SELECT * FROM student_has_class INNER JOIN student ON student_has_class.student_id = student.student_id WHERE grade = :id AND room = :room";
$statement = $conn->prepare($sql);
$statement->execute($params);

$result = $statement->fetchAll(PDO::FETCH_ASSOC);

if(count($result)){
    $response -> success($result); 
}else {
    $response -> error(); 
}


?>