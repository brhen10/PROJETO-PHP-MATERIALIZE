<?php
require_once './Controller/ReceitaController.php';
require_once("DAL/Banco.php");

$receitaController = new ReceitaController();

if (filter_input(INPUT_GET, "cod")) {

    $receitaController->Deletar(filter_input(INPUT_GET, "cod"));
}

$listaMedicamento = $receitaController->RetornaTudo();
?>
<div id="dvBuscar">
    <h3>Pesquisa</h3>

    <br />
    <?php
    if ($listaMedicamento != null) {
        ?>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Data</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listaMedicamento as $medicamento) {
                    ?>
                    <tr>
                        <td><?= $medicamento->getTitulo(); ?></td>
                        <td><?= $medicamento->getData(); ?></td>
                        <td>
                            <a href="?pagina=ver_cliente&cod=<?= $medicamento->getCod(); ?>" class="waves-effect red darken-1 accent-3 btn">ver</a>


                        </td>
                    </tr>

                    <?php
                }
                ?>

            </tbody>
        </table>
        
            <a href="?pagina=index.php" class="waves-effect yellow accent-1 accent-3 btn">Voltar</a>
        
        <?php
    } else {

        echo "Nenhum item a ser listado";
    }
    ?>
</div>