<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/css.css">
    <link rel="icon" type="img" href="./img/logo.png" />
    <title>SAPINRS</title>
</head>

<body>
    <header class="menu_principal">
    </header>
    <div>
    <?php
    include_once'./views/header.php';
    ?>
    </div>
    <br>
    <!--Carousel-->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block" src="./img/1.png" alt="Primeiro Slide">
            </div>
            <div class="carousel-item">
                <img class="d-block " src="./img/2.png" alt="Segundo Slide">
            </div>
            <div class="carousel-item">
                <img class="d-block " src="./img/3.png" alt="Terceiro Slide">
            </div>
            <div class="carousel-item">
                <img class="d-block " src="./img/4.png" alt="Quarto Slide">
            </div>
            <div class="carousel-item">
                <img class="d-block " src="./img/5.png" alt="Quinto Slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Próximo</span>
        </a>
    </div>
    <!--formluario do associe-se-->
    <div class="formulario">
        <form class="form_associe" method="get" action="#">
            <h1 class="form_titulo">Associe-se</h1>
            <input class="form_campo1" type="text" name="nome" placeholder="Nome:" required>
            <p></p>
            <input class="form_campo2" type="email" name="email" placeholder="E-mail:" required>
            <input class="form_campo2" type="text" name="whats" placeholder="WhatsApp:" required>
            <p></p>
            <input class="button_form" type="submit" name="enviar" value="Enviar">
            <input class="button_form" type="reset">
        </form>
    </div>
    <!--Atendimento-->
    <div class="atendimento">
        <h1 class="horario_atendimento">Horário de atendimento</h1>
        <p>8h00 às 20h30</p>
        <p>Secretaria: De Segunda à Sexta das 10h às 19h</p>
    </div>
</body>
<footer class="footer">
    <!--Telefones de contato-->
    <?php
        include_once './views/footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</footer>

</html>