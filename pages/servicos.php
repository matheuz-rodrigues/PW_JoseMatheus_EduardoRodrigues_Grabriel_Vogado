<?php
$message = "";
$alertScript = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome       = trim($_POST['nome'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $modalidade = trim($_POST['modalidade'] ?? '');
    $horario    = trim($_POST['horario'] ?? '');
    $dias       = $_POST['dias'] ?? array();

    if (empty($nome) || empty($email) || empty($modalidade) || empty($horario) || empty($dias)) {
        $alertScript = "<script>alert('Todos os campos são obrigatórios, incluindo a seleção de pelo menos um dia da semana.');</script>";
    } else {
        $dias_str = implode(", ", $dias);

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=academia", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("INSERT INTO appointments (nome, email, modalidade, horario, dias) VALUES (:nome, :email, :modalidade, :horario, :dias)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':modalidade', $modalidade);
            $stmt->bindParam(':horario', $horario);
            $stmt->bindParam(':dias', $dias_str);

            if ($stmt->execute()) {
                $alertScript = "<script>alert('Agendamento realizado com sucesso!');</script>";
            } else {
                $alertScript = "<script>alert('Erro ao realizar o agendamento.');</script>";
            }
        } catch (PDOException $e) {
            $alertScript = "<script>alert('Erro: " . addslashes($e->getMessage()) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Piticos Gym</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/servico.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <script src="../js/script.js"></script>
    <?php echo $alertScript; ?>
</head>

<body>
    <header>
        <img src="../img/logo.jpg" alt="Logo" onclick="index.html">
        <ul>
            <li><a href="index.html">Home |</a></li>
            <li><a href="servicos.php">Serviços e Horarios |</a></li>
            <li><a href="dicas.html">Dicas |</a></li>
            <li><a href="contato.php">Fale Conosco </a></li>
        </ul>
        <div class="text-box">
            <a href="area-aluno.php" class="btn btn-white btn-animate">Área do Aluno</a>
        </div>
    </header>


    <section class="modalidade">
        <div class="content left">
            <h2>CrossFit</h2>
            <p>A modalidade de treinamento funcional mais intensa e dinâmica! O <strong>CrossFit</strong> combina <br>
                levantamento de peso, ginástica e exercícios cardiovasculares, desafiando seu corpo a se<br>
                superar a cada treino. Ideal para quem busca alta performance, força e resistência.</p>
        </div>
        <div class="image right">
            <img src="https://via.placeholder.com/300" alt="CrossFit">
        </div>
    </section>

    <section class="modalidade">
        <div class="content right">
            <h2>Pilates</h2>
            <p>O <strong>Pilates</strong> foca no fortalecimento muscular, na flexibilidade e no equilíbrio. Com movimentos <br>
                controlados e exercícios no solo ou com aparelhos, você vai melhorar a postura, a coordenação<br>
                e o alongamento, de forma suave e eficiente, sem impacto para as articulações.</p>
        </div>
        <div class="image left">
            <img src="https://via.placeholder.com/300" alt="Pilates">
        </div>
    </section>

    <section class="modalidade">
        <div class="content left">
            <h2>Dança</h2>
            <p>A <strong>Dança</strong> é uma atividade que mistura diversão e exercício. Através de diferentes ritmos, como
                Zumba, Hip Hop e Dança de Salão, você vai trabalhar a coordenação motora, a agilidade e, claro,
                queimar muitas calorias! Perfeita para quem quer se expressar de maneira leve e animada.</p>
        </div>
        <div class="image right">
            <img src="https://via.placeholder.com/300" alt="Dança">
        </div>
    </section>

    <section class="modalidade">
        <div class="content right">
            <h2>Yoga</h2>
            <p>A prática de <strong>Yoga</strong> é voltada para o equilíbrio entre corpo e mente. Com posturas que promovem
                flexibilidade, força e concentração, o Yoga ajuda a reduzir o estresse e melhorar a qualidade do
                sono, além de proporcionar uma sensação de bem-estar e calma para o seu dia a dia.</p>
        </div>
        <div class="image left">
            <img src="https://via.placeholder.com/300" alt="Yoga">
        </div>
    </section>

    <section class="modalidade">
        <div class="content left">
            <h2>Musculação</h2>
            <p>Com a <strong>Musculação</strong>, você vai fortalecer seu corpo e melhorar o condicionamento físico de maneira
                controlada e personalizada. Seja para ganhar massa muscular, melhorar a resistência ou definir o
                corpo, nossos treinos são elaborados para atender suas necessidades, com acompanhamento especializado.</p>
        </div>
        <div class="image right">
            <img src="https://via.placeholder.com/300" alt="Musculação">
        </div>
    </section>

    <section class="modalidade">
        <div class="content right">
            <h2>Artes Marciais</h2>
            <p>Desenvolva disciplina, força e confiança com as <strong>Artes Marciais</strong>! Nossas aulas de <strong>karatê</strong>,
                <strong>judo</strong>, <strong>taekwondo</strong> e <strong>kickboxing</strong> são perfeitas para quem deseja aprender
                técnicas de defesa pessoal, melhorar a flexibilidade e aumentar a resistência física, tudo enquanto adquire
                autoconfiança e respeito.
            </p>
        </div>
        <div class="image left">
            <img src="https://via.placeholder.com/300" alt="Artes Marciais">
        </div>
    </section>

    <section class="team">
        <h2>Conheça nossa Equipe de Personal Trainers</h2>
        <div class="cards">
            <div class="card">
                <img src="https://via.placeholder.com/150" alt="Personal Trainer 1">
                <div class="card-content">
                    <h3>João Silva</h3>
                    <p class="subtitulo">Personal Trainer - Treinamento Funcional</p>
                    <p class="descricao">Com vasta experiência em treinamento funcional, João ajuda a melhorar a força, a resistência e a flexibilidade de seus alunos, adaptando os treinos às suas necessidades e objetivos.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/150" alt="Personal Trainer 2">
                <div class="card-content">
                    <h3>Ana Costa</h3>
                    <p class="subtitulo">Personal Trainer - Musculação</p>
                    <p class="descricao">Ana é especializada em musculação e treinamento de força. Ela trabalha com seus alunos para alcançar objetivos como hipertrofia muscular e condicionamento físico de forma segura e eficiente.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/150" alt="Personal Trainer 3">
                <div class="card-content">
                    <h3>Lucas Pereira</h3>
                    <p class="subtitulo">Personal Trainer - Cardio e Emagrecimento</p>
                    <p class="descricao">Lucas foca em treinos cardiovasculares para emagrecimento e melhora da resistência física. Seus programas são personalizados para ajudar cada aluno a atingir suas metas de forma saudável e eficaz.</p>
                </div>
            </div>

            <div class="card">
                <img src="https://via.placeholder.com/150" alt="Personal Trainer 4">
                <div class="card-content">
                    <h3>Carla Oliveira</h3>
                    <p class="subtitulo">Personal Trainer - Pilates e Flexibilidade</p>
                    <p class="descricao">Carla é especialista em Pilates e trabalha com seus alunos para melhorar a postura, flexibilidade e força do core, com foco na prevenção de lesões e qualidade de vida.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="formAgendar">
        <div class="main">
            <!-- Checkbox oculto para controle de layout (conforme estrutura original) -->
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="signup">
                <form action="" method="post">
                    <label for="chk" aria-hidden="true">Agende sua aula</label>

                    <!-- Exibe mensagem de sucesso ou erro -->
                    <?php if (!empty($message)) : ?>
                        <div class="message"><?php echo htmlspecialchars($message); ?></div>
                    <?php endif; ?>

                    <input type="text" name="nome" placeholder="Informe seu nome" required>
                    <input type="email" name="email" placeholder="Email" required>

                    <select name="modalidade" required>
                        <option value="">Selecione uma Modalidade</option>
                        <option value="CrossFit">CrossFit</option>
                        <option value="Pilates">Pilates</option>
                        <option value="Dança">Dança</option>
                        <option value="Yoga">Yoga</option>
                        <option value="Musculação">Musculação</option>
                        <option value="Artes Marciais">Artes Marciais</option>
                    </select>

                    <select name="horario" required>
                        <option value="">Selecione um horário</option>
                        <option value="8h00min">8h00min</option>
                        <option value="10h00min">10h00min</option>
                        <option value="11h30min">11h30min</option>
                        <option value="15h00min">15h00min</option>
                        <option value="17h00min">17h00min</option>
                        <option value="19h00min">19h00min</option>
                    </select>

                    <!-- Conjunto de checkboxes para os dias da semana -->
                    <fieldset>
                        <label>Selecione os dias da semana</label>
                        <div class="dias">
                            <input type="checkbox" name="dias[]" id="segunda" value="Segunda">
                            <label class="dias-label" for="segunda">Segunda</label>
                            <input type="checkbox" name="dias[]" id="terca" value="Terça">
                            <label class="dias-label" for="terca">Terça</label>
                            <input type="checkbox" name="dias[]" id="quarta" value="Quarta">
                            <label class="dias-label" for="quarta">Quarta</label>
                            <input type="checkbox" name="dias[]" id="quinta" value="Quinta">
                            <label class="dias-label" for="quinta">Quinta</label>
                            <input type="checkbox" name="dias[]" id="sexta" value="Sexta">
                            <label class="dias-label" for="sexta">Sexta</label>
                            <input type="checkbox" name="dias[]" id="sabado" value="Sábado">
                            <label class="dias-label" for="sabado">Sábado</label>
                            <input type="checkbox" name="dias[]" id="domingo" value="Domingo">
                            <label class="dias-label" for="domingo">Domingo</label>
                        </div>
                    </fieldset>


                    <button id="btnEnviar">Enviar</button>
                </form>
            </div>
        </div>
    </section>


    <footer class="rodape">
        <p>2025 Piticos Gym &copy; Todos os direitos reservados. Desenvolvido por J. Matheus, Eduardo R. e Gabriel V. </p>
    </footer>
</body>

</html>