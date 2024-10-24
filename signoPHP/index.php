<?php include('layouts/header.php'); ?>
<div class="container">
    <h1>Descubra seu Signo</h1>
    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Descobrir Signo</button>
    </form>
</div>
<?php include('layouts/footer.php'); ?>
