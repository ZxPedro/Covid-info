<!DOCTYPE html>
<html>

<head>
    <title>States-Covid</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    require_once 'Services/CovidService.php';

    $model = new CovidService();
    $cases = $model->getCases();

    if (isset($_GET['country'])) {
        $country = $_GET['country'];
        $cases = $model->getCases($country);
    }
    ?>
    <main>
        <section>
            <div class="container">
                <div>
                    <form action="index.php" method="get">
                        <h1>DIGITE O NOME DO PAÍS</h1>
                        <input type="text" id="search" name="country">
                        <input type="submit" value="Pesquisar" id="btn-search">
                    </form>
                </div>
            </div>
            <div class="container">
                <div class="box-cards">
                    <div class="cards left">
                        <div class="title-card confirmed">
                            <img src="assets/check-mark.svg" />
                            <h3>Confirmados</h3>
                        </div>
                        <p>Foram confirmados mais de
                            <strong>
                                <?= number_format($cases['confirmados'], 0, '', '.') ?> casos
                            </strong> de COVID-19 até o momento!
                        </p>
                    </div>
                    <div class="cards middle">
                        <div class="title-card recovered">
                            <img src="assets/protection.svg" />
                            <h3>Recuperados</h3>
                        </div>
                        <p>Mais de <strong><?= number_format($cases['recuperados'], 0, '', '.') ?> casos derecuperação</strong> da COVID-19 até o momento!</p>
                    </div>
                    <div class="cards right">
                        <div class="title-card deaths">
                            <img src="assets/skull.svg" />
                            <h3>Mortes</h3>
                        </div>
                        <p>Mais de<strong><?= number_format($cases['mortos'], 0, '', '.') ?> mortes devido</strong> a COVID-19 até o momento!</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>