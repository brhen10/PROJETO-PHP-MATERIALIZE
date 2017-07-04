<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Projeto Final de Programação Web I</title>

        <script src="js/jquery-1.12.1.min.js" type="text/javascript"></script>
        <script src="materialize/js/materialize.min.js"></script>
        <link rel="stylesheet" href="css/style.css" media="all" />
        <link rel="stylesheet" href="materialize/css/materialize.min.css" media="all" />
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <div id="dvCentro" style="margin: 0 auto;">
            <div class="row">
                <div class="col s12 m12">
                    <div class="card">
                        <div class="card-image">
                            <img src="img/BURLA.png" alt="TSI - promovendo saúde"/>
                            <div class="center-align">
                                <span style="color:blue" >Todo medicamento deve ser receitado por um Médico</span>
                            </div>
                        </div>
                        <div class="center-align">
                            <a href="?pagina=pesquisa_paciente"><span style="color:blue">PESQUISE POR BULA CLICANDO AQUI</span></a>
                        </div>
                        <div class="center-align">
                            <a href="login/temp.php"><span style="color:blue">FAÇA LOGIN AQUI</span></a>
                        </div>
                        <div class="card-content">

                            <?php
                            $pagina = filter_input(INPUT_GET, "pagina");

                            switch ($pagina) {
                                case "pesquisa":
                                    require_once("View/pesquisa.php");
                                    break;

                                case "ver":
                                    require_once("View/ver.php");
                                    break;
                                case "pesquisa_paciente":
                                    require_once("View/pesquisa_paciente.php");
                                    break;
                                case "ver_cliente":
                                    require_once("View/ver_cliente.php");
                                    break;
                            }
                            ?>
                            <br />
                            <div class="card-image">
                                <img src="img/bula.png" alt="TSI - promovendo saúde"/>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </body>
</html>
