<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: *");
//header("Access-Control-Allow-Methods: GET,PUT,POST,DELETE");

include_once 'conexao.php';

$response_json = file_get_contents("php://input");
$dados = json_decode($response_json, true);

if ($dados) {

    $sql = "INSERT INTO tabela1 (coluna1, coluna2) VALUES (:coluna1, :coluna2)";
    $resultado = $conn->prepare($sql);

    $resultado->bindParam(':coluna1', $dados['registro']['coluna1'], PDO::PARAM_STR);
    $resultado->bindParam(':coluna2', $dados['registro']['coluna2'], PDO::PARAM_STR);

    $resultado->execute();

    if ($resultado->rowCount()) {
        $response = [
            "erro" => false,
            "messagem" => "Registro cadastrado com sucesso!"
        ];
    } else {
        $response = [
            "erro" => true,
            "messagem" => "Registro não cadastrado!"
        ];
    }
} else {
    $response = [
        "erro" => true,
        "messagem" => "Registros não enviados!"
    ];
}

http_response_code(200);
echo json_encode($response);
