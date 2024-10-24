<?php include('layouts/header.php'); ?>
<div class="container">
    <div id="signoInfo" class="
        <?php
            $data_nascimento = $_POST['data_nascimento'];
            $diaMes = date('d/m', strtotime($data_nascimento));

            $signos = simplexml_load_file('signos.xml');
            $signoEncontrado = null;
            $signoClasse = '';

            foreach ($signos->signo as $signo) {
                $dataInicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
                $dataFim = DateTime::createFromFormat('d/m', $signo->dataFim);

                $anoAtual = date('Y');
                $dataInicio->setDate($anoAtual, $dataInicio->format('m'), $dataInicio->format('d'));
                $dataFim->setDate($anoAtual, $dataFim->format('m'), $dataFim->format('d'));
                $dataNascimento = DateTime::createFromFormat('d/m', $diaMes);

                if ($dataInicio > $dataFim) {
                    if (($dataNascimento >= $dataInicio) || ($dataNascimento <= $dataFim)) {
                        $signoEncontrado = $signo;
                        $signoClasse = "signo-" . strtolower($signo->signoNome);
                        break;
                    }
                } else {
                    if ($dataNascimento >= $dataInicio && $dataNascimento <= $dataFim) {
                        $signoEncontrado = $signo;
                        $signoClasse = "signo-" . strtolower($signo->signoNome);
                        break;
                    }
                }
            }

            if ($signoEncontrado) {
                echo $signoClasse;
            } else {
                echo "bg-danger";
            }
        ?>
    ">
        <?php
            if ($signoEncontrado) {
                echo "<h2>{$signoEncontrado->signoNome}</h2>";
                echo "<p>{$signoEncontrado->descricao}</p>";
            } else {
                echo "<h2>Tem algo de errado...</h2>";
                echo "<p>Verifica a sua data de nascimento, não achei seu signo.</p>";
            }
        ?>
        <a href="index.php" class="btn btn-primary mt-3">Voltar</a>
    </div>
</div>

<?php include('layouts/footer.php'); ?>
