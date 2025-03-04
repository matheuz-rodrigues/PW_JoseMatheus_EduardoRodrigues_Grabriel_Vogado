<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Administrativo</title>
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/index.css">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
        <script src="../js/script.js"></script>
    </head>
<body>
    <header>
        <img src="../img/logo.jpg" alt="Logo" onclick="index.html">
        <ul>
            <li><a href="index.html">Home |</a></li>
            <li><a href="servicos.html">Serviços e Horarios |</a></li>
            <li><a href="dicas.html">Dicas |</a></li>
            <li><a href="contato.php">Fale Conosco </a></li>
        </ul>
    </header>
    
    <div class="container">
        <h2>Admin - Tabela de Opiniões</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Assunto</th>
                    <th>Telefone</th>
                    <th>Opinião</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $host = "localhost";
                $dbname = "fale_comigo_bd";
                $username = "root";
                $password = "";

                $conn = new mysqli($host, $username, $password, $dbname);
    
                if ($conn->connect_error) {
                    die("Erro na conexão: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM opinioes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['nome'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['assunto'] . "</td>
                                <td>" . $row['telefone'] . "</td>
                                <td>" . $row['opiniao'] . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhuma opinião encontrada.</td></tr>";
                }
    
                $conn->close();
                ?>
            </tbody>
        </table>
</body>
</html>

