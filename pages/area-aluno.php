<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Credenciais fixas para o admin
    if ($_POST["userLogin"] === "admin" && $_POST["senhaLogin"] === "123456") {
        $_SESSION["admin"] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Credenciais inválidas!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Aluno</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/area-aluno.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
</head>

<body>
    <?php if ($error): ?>
        <script>
            alert("<?php echo $error; ?>");
        </script>
    <?php endif; ?>
    <header>
        <img src="../img/logo.jpg" alt="Logo" onclick="window.location.href='index.html'">
        <ul>
            <li><a href="index.html">Home |</a></li>
            <li><a href="servicos.php">Serviços e Horarios |</a></li>
            <li><a href="dicas.html">Dicas |</a></li>
            <li><a href="contato.php">Fale Conosco</a></li>
        </ul>
        <div class="text-box">
            <a href="#" class="btn btn-white btn-animate">Área do Aluno</a>
        </div>
    </header>

    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="index.php" method="post">
                <label for="chk" aria-hidden="true">Cadastre-se</label>
                <input type="text" name="txt" placeholder="Informe seu nome" required="">
                <input type="text" name="email" placeholder="Email" required="">
                <input type="number" name="number" placeholder="Telefone" required="">
                <input type="password" name="pswd" placeholder="Senha" required="">
                <button id="btnCadastro">Cadastrar</button>
            </form>
        </div>

        <div class="login">
            <form action="" method="post">
                <label for="chk" aria-hidden="true">Entrar</label>
                <input type="text" id="userLogin" name="userLogin" placeholder="Email ou CPF" required="">
                <input type="password" id="senhaLogin" name="senhaLogin" placeholder="Senha" required="">
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <footer class="rodape">
        <p>2025 Piticos Gym &copy; Todos os direitos reservados. Desenvolvido por J. Matheus, Eduardo R. e Gabriel V.</p>
    </footer>
</body>

</html>