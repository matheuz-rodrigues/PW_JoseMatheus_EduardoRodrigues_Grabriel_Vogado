<?php

$host = "localhost";
$dbname = "academia";
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
        echo "<script>alert('Opinião enviada com sucesso! Obrigado por seu feedback'); window.location.href='index.html';</script>";
    } else {
        echo "Erro ao enviar opinião: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/contato.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <script src="../js/script.js"></script>
</head>

<body>
    <header>
        <img src="../img/logo.jpg" alt="Logo" onclick="location.href='../index.html'">
        <ul>
            <li><a href="index.html">Home |</a></li>
            <li><a href="servicos.php">Serviços e Horários |</a></li>
            <li><a href="dicas.html">Dicas |</a></li>
            <li><a href="contato.php">Fale Conosco</a></li>
        </ul>
        <div class="text-box">
            <a href="area-aluno.php" class="btn btn-white btn-animate">Área do Aluno</a>
        </div>
    </header>

    <section class="main">
        
        <div class="form">
            <form  method="post">
                <label for="chk" aria-hidden="true">Mande sua opinião</label>
                <input type="text" name="txt" placeholder="Informe seu nome" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <select name="assunto" required>
                    <option value="">Selecione um Assunto</option>
                    <option value="Suporte">Suporte</option>
                    <option value="Dúvidas">Dúvidas</option>
                    <option value="Sugestão">Sugestão</option>
                    <option value="Outro">Outro</option>
                </select>
                <input type="number" name="number" placeholder="Telefone" required="">
                <textarea placeholder="Digite sua opinião / Sugestão  ou Duvida" name="opniao" required=""></textarea>
                <button id="btnEnviar">Enviar</button>
            </form>
        </div>
    </section>

    <footer class="rodape">
        <p>2025 Piticos Gym &copy; Todos os direitos reservados. Desenvolvido por J. Matheus, Eduardo R. e Gabriel V. </p>    
    </footer>

</body>

</html>
