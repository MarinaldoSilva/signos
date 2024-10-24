<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seu Signo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Seu Signo</h1>
        <div id="signoInfo">
            <?php
                $dataNascimento = $_POST['dataNascimento'];
                $diaMes = date('d/m', strtotime($dataNascimento));

                $signos = simplexml_load_file('signos.xml');
                $signoEncontrado = null;

                foreach ($signos->signo as $signo) {
                    $dataInicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
                    $dataFim = DateTime::createFromFormat('d/m', $signo->dataFim);
                    $dataNascimento = DateTime::createFromFormat('d/m', $diaMes);

                    if ($dataNascimento >= $dataInicio && $dataNascimento <= $dataFim) {
                        $signoEncontrado = $signo;
                        break;
                    }
                }

                if ($signoEncontrado) {
                    echo "<h2>{$signoEncontrado->signoNome}</h2>";
                    echo "<p>{$signoEncontrado->descricao}</p>";
                } else {
                    echo "<p>Data de nascimento inválida ou signo não encontrado.</p>";
                }
            ?>
        </div>
    </div>
</body>
</html>
