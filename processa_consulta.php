<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_paciente = $conn->real_escape_string($_POST['paciente']);
    $data_consulta = $conn->real_escape_string($_POST['data-consulta']);
    $hora_consulta = $conn->real_escape_string($_POST['hora-consulta']);

    // Buscar paciente pelo nome
    $result = $conn->query("SELECT id FROM pacientes WHERE nome='$nome_paciente'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $paciente_id = $row['id'];

        $sql = "INSERT INTO consultas (paciente_id, data_consulta, hora_consulta) VALUES ('$paciente_id', '$data_consulta', '$hora_consulta')";

        if ($conn->query($sql) === TRUE) {
            echo "Consulta marcada com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Paciente não encontrado.";
    }

    $conn->close();
}
?>
