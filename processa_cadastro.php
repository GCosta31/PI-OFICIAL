<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $telefone = $conn->real_escape_string($_POST['telefone']);
    $data_nascimento = $conn->real_escape_string($_POST['data-nascimento']);

    $sql = "INSERT INTO pacientes (nome, email, telefone, data_nascimento) VALUES ('$nome', '$email', '$telefone', '$data_nascimento')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
