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
    <link rel="stylesheet" href="../css/servico.css">
    <link rel="shortcut icon" href="../img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
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
            <p>A modalidade de treinamento funcional mais intensa e dinâmica! O <strong>CrossFit</strong> combina 
                levantamento de peso, ginástica e exercícios cardiovasculares, desafiando seu corpo a se
                superar a cada treino. Ideal para quem busca alta performance, força e resistência.</p>
            <p>Durante as aulas de CrossFit, os alunos realizam treinos variados e funcionais, que incluem atividades como levantamento de peso olímpico, ginástica (flexões, barras e abdominais), e treinos cardiovasculares. O objetivo é melhorar o condicionamento físico geral, queima de gordura e força muscular.</p>
            <ul>
                <li>Melhora da força e resistência muscular.</li>
                <li>Aumenta a capacidade cardiovascular e respiratória.</li>
                <li>Desafios diários com treinos constantemente variados.</li>
            </ul>
        </div>
        <div class="image right">
            <img src="../img/crossfit-beneficios-lesoes-miniatura.jpg" alt="CrossFit">
        </div>
    </section>

    <section class="modalidade">
        <div class="content right">
            <h2>Pilates</h2>
            <p>O <strong>Pilates</strong> foca no fortalecimento muscular, na flexibilidade e no equilíbrio. Com movimentos 
                controlados e exercícios no solo ou com aparelhos, você vai melhorar a postura, a coordenação
                e o alongamento, de forma suave e eficiente, sem impacto para as articulações.</p>
            <p>O Pilates é uma técnica de exercício que utiliza movimentos lentos e controlados, com foco na respiração, alinhamento e fortalecimento do core. Ideal para quem quer melhorar a flexibilidade, força e equilíbrio sem forçar as articulações.</p>
            <ul>
                <li>Melhora da flexibilidade e alongamento muscular.</li>
                <li>Fortalecimento do core (abdominais e lombar).</li>
                <li>Prevenção de lesões, especialmente em atividades de alto impacto.</li>
            </ul>
        </div>
        <div class="image left">
            <img src="../img/pilates.jpeg" alt="Pilates">
        </div>
    </section>

    <section class="modalidade">
        <div class="content left">
            <h2>Dança</h2>
            <p>A <strong>Dança</strong> é uma atividade que mistura diversão e exercício. Através de diferentes ritmos, como
                Zumba, Hip Hop e Dança de Salão, você vai trabalhar a coordenação motora, a agilidade e, claro,
                queimar muitas calorias! Perfeita para quem quer se expressar de maneira leve e animada.</p>
            <p>As aulas de Dança são uma excelente maneira de melhorar o ritmo corporal, aumentar a resistência cardiovascular e, ao mesmo tempo, se divertir. Oferecemos estilos variados, como Zumba para emagrecimento e Hip Hop para quem gosta de desafios mais dinâmicos.</p>
            <ul>
                <li>Melhora a coordenação motora e equilíbrio.</li>
                <li>Aumenta a resistência cardiovascular.</li>
                <li>Atividade divertida que queima muitas calorias.</li>
            </ul>
        </div>
        <div class="image right">
            <img src="../img/danca.jpg" alt="Dança">
        </div>
    </section>

    <section class="modalidade">
        <div class="content right">
            <h2>Yoga</h2>
            <p>A prática de <strong>Yoga</strong> é voltada para o equilíbrio entre corpo e mente. Com posturas que promovem
                flexibilidade, força e concentração, o Yoga ajuda a reduzir o estresse e melhorar a qualidade do
                sono, além de proporcionar uma sensação de bem-estar e calma para o seu dia a dia.</p>
            <p>O Yoga envolve uma série de posturas, respirações controladas e técnicas de meditação. Além de melhorar a flexibilidade e fortalecer o corpo, também proporciona um grande benefício psicológico, reduzindo o estresse e a ansiedade.</p>
            <ul>
                <li>Melhora a flexibilidade e a força muscular.</li>
                <li>Reduz o estresse e aumenta o foco mental.</li>
                <li>Auxilia na melhoria da qualidade do sono.</li>
            </ul>
        </div>
        <div class="image left">
            <img src="../img/yoga.webp" alt="Yoga">
        </div>
    </section>

    <section class="modalidade">
        <div class="content left">
            <h2>Musculação</h2>
            <p>Com a <strong>Musculação</strong>, você vai fortalecer seu corpo e melhorar o condicionamento físico de maneira
                controlada e personalizada. Seja para ganhar massa muscular, melhorar a resistência ou definir o
                corpo, nossos treinos são elaborados para atender suas necessidades, com acompanhamento especializado.</p>
            <p>A musculação é a base para o ganho de força, aumento de massa muscular e redução de gordura corporal. As aulas podem ser adaptadas para iniciantes, intermediários e avançados, com foco em resultados específicos como hipertrofia ou emagrecimento.</p>
            <ul>
                <li>Aumento de massa muscular e força.</li>
                <li>Melhora do condicionamento físico e resistência.</li>
                <li>Redução de gordura corporal de maneira controlada.</li>
            </ul>
        </div>
        <div class="image right">
            <img src="../img/musculacao.png" alt="Musculação">
        </div>
    </section>

    <section class="modalidade">
        <div class="content right">
            <h2>Artes Marciais</h2>
            <p>Desenvolva disciplina, força e confiança com as <strong>Artes Marciais</strong>! Nossas aulas de <strong>karatê</strong>,
                <strong>judo</strong>, <strong>taekwondo</strong> e <strong>kickboxing</strong> são perfeitas para quem deseja aprender
                técnicas de defesa pessoal, melhorar a flexibilidade e aumentar a resistência física, tudo enquanto adquire
                autoconfiança e respeito.</p>
            <p>As Artes Marciais ajudam a melhorar o controle do corpo e da mente, além de ensinar técnicas de defesa pessoal. Elas oferecem uma excelente oportunidade para aumentar a disciplina e o respeito próprio, ao mesmo tempo que se trabalha o corpo de forma intensa e eficiente.</p>
            <ul>
                <li>Desenvolvimento da disciplina e respeito.</li>
                <li>Aumento da flexibilidade e resistência física.</li>
                <li>Aprendizado de técnicas de defesa pessoal.</li>
            </ul>
        </div>
        <div class="image left">
            <img src="../img/luta.avif" alt="Artes Marciais">
        </div>
    </section>
    <div class="team">
    <div class="container swiper">
        <div class="slider-wrapper">
            <div class="card-list swiper-wrapper">
                <div class="card-item swiper-slide">
                    <img src="img/personal" alt="personal1" class="user-image">
                    <h2 class="user-name">James Wilson</h2>
                    <p class="user-profession">Software</p>
                    <button class="message-button">message</button>
                </div>

                <div class="card-item swiper-slide">
                    <img src="img/personal" alt="personal1" class="user-image">
                    <h2 class="user-name">Duck White</h2>
                    <p class="user-profession">Software</p>
                    <button class="message-button">message</button>
                </div>

                <div class="card-item swiper-slide">
                    <img src="img/personal" alt="personal1" class="user-image">
                    <h2 class="user-name">eduardo</h2>
                    <p class="user-profession">Software</p>
                    <button class="message-button">message</button>
                </div>

                <div class="card-item swiper-slide">
                    <img src="img/personal" alt="personal1" class="user-image">
                    <h2 class="user-name">carlos</h2>
                    <p class="user-profession">Software</p>
                    <button class="message-button">message</button>
                </div>

                <div class="card-item swiper-slide">
                    <img src="img/personal" alt="personal1" class="user-image">
                    <h2 class="user-name">gabriel</h2>
                    <p class="user-profession">Software</p>
                    <button class="message-button">message</button>
                </div>

                <div class="card-item swiper-slide">
                    <img src="img/personal" alt="personal1" class="user-image">
                    <h2 class="user-name">pitico</h2>
                    <p class="user-profession">Software</p>
                    <button class="message-button">message</button>
                </div>
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>
    </div>
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
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="../js/script.js"></script>
</body>


</html>