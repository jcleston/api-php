<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'conexao.php';

$sql = "SELECT id, coluna1, coluna2 FROM tabela1 ORDER BY id DESC";
$resultado = $conn->prepare($sql);
$resultado->execute();

if (($resultado) and ($resultado->rowCount() != 0)) {
    while ($linhas = $resultado->fetch(PDO::FETCH_ASSOC)) {
        extract($linhas);

        $lista_registros["records"][$id] = [
            'id' => $id,
            'coluna1' => $coluna1,
            'coluna2' => $coluna2
        ];
    }

    //Resposta com status 200
    http_response_code(200);

    //Retornar os registros em formato json
    echo json_encode($lista_registros);
}
