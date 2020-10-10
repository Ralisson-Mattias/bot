<?php

// $conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

// $getMesg = mysqli_real_escape_string($conn, $_POST['text']);

// $check_data = "SELECT replies FROM chatbot where queries LIKE '%$getMesg%'";

// $run_query = mysqli_query($conn, $check_data) or die("Error");


// if(mysqli_num_rows($run_query) > 0) {
//     $fetch_data = mysqli_fetch_assoc($run_query);

//     $replay = $fetch_data['replies'];
//     echo $replay;
// } else {
//     echo "Desculpe! nâo consegui entender!";
// }

$dsn = 'mysql:host=localhost;dbname=bot';
$usuario = 'root';
$senha = '';

try {
    $conexao = new PDO($dsn, $usuario, $senha);

    $query = 'select replies from chatbot where queries like :queries';


    $stmt = $conexao->prepare($query);
    $texto = $_POST['text'];
    $stmt->bindValue(':queries', "%$texto%", PDO::PARAM_STR);
    $stmt->execute();

    $resultado = $stmt->fetch();

    if($resultado > 0) {
        $res = $resultado['replies'];
        echo $res;
    } else {
        echo 'Desculpe, não consegui entender!';
    }

} catch (PDOException $e) {
    echo 'Erro: ' . $e->getCode() . 'Mensagem: ' . $e->getMessage();
}
