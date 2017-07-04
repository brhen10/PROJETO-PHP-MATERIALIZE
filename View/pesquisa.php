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
    <h3>Pesquisa como Administrador</h3>

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
                            <a href="?pagina=novo&cod=<?= $medicamento->getCod(); ?>" class="waves-effect yellow acces-1 accent-3 btn">Editar</a>
                            <a href="?pagina=ver&cod=<?= $medicamento->getCod(); ?>" class="waves-effect blue darken-1 accent-3 btn">ver</a>
                            <a onclick="return confirm('Deseja realmente deletar?');" href="?pagina=pesquisa&cod=<?= $medicamento->getCod(); ?>" class="waves-effect red accent-1 accent-3 btn">Remover</a>
                        </td>
                    </tr>

                    <?php
                }
                ?>

            </tbody>
        </table>

        <?php
    } else {

        echo "Nenhum item a ser listado";
    }
    ?>
</div>