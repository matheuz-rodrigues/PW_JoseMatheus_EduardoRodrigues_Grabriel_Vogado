<?php

$host = "localhost";
$dbname = "fale_comigo_bd";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['txt'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $telefone = $_POST['number'];
    $opiniao = $_POST['opniao'];

    $sql = "INSERT INTO opinioes (nome, email, assunto, telefone, opiniao) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Erro na preparação: " . $conn->error);
    }

    $stmt->bind_param("sssss", $nome, $email, $assunto, $telefone, $opiniao);

    if ($stmt->execute()) {
        echo "<script>alert('Opinião enviada com sucesso! Obrigado por seu feedback'); window.location.href='../pages/index.html';</script>";
    } else {
        echo "Erro ao enviar opinião: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
