<?php
require_once("Controller/ReceitaController.php");
require_once("DAL/Banco.php");
$cod = filter_input(INPUT_GET, "cod");
?>
<div id="dvVer">
    <h3>Visualizar</h3>
    <br />
    <?php
    if ($cod) {
        $receitaController = new ReceitaController();
        $medicamento = $receitaController->RetornaMedicamento($cod);

        if ($medicamento != null) {
            ?>
            <ul>
                <li class="text">Título</li>
                <li class="break"><?= $medicamento->getTitulo(); ?></li>
                
                <li class="text">Data</li>
                <li class="break"><?= $medicamento->getData(); ?></li>

                <li class="text">Composicao</li>
                <li class="break"><?= $medicamento->getComposicao(); ?></li>

                <li class="text">Indicacao</li>
                <li class="break"><?= $medicamento->getIndicacao(); ?></li>

                <li class="text">
                    <a href="?pagina=pesquisa_paciente" class="waves-effect red accent-1 accent-3 btn">Voltar</a>
                </li>

            </ul>
            <?php
        } else {
            echo "Medicamento não encontrado";
        }
    } else {
        echo "Código não encontrado";
    }
    ?>
</div>