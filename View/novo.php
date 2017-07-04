<?php
require_once("Controller/ReceitaController.php");
require_once("Controller/CategoriaController.php");
require_once("Model/Categoria.php");
require_once("Model/Medicamento.php");
require_once("DAL/Banco.php");

$receitaController = new ReceitaController();
$medicamento = new Medicamento();

$categoriaController = new CategoriaController();
$categoria = new Categoria();

$nome = "";
$titulo = "";
$composicao = "";
$indicacao = "";
$resultado = "";

$cod = filter_input(INPUT_GET, "cod");

$btnGravar = filter_input(INPUT_POST, "btnGravar");
if ($btnGravar) {
    
    $medicamento->setIdcategoria(filter_input(INPUT_POST, "group1"));
    $medicamento->setTitulo(filter_input(INPUT_POST, "txtTitulo"));
    $medicamento->setComposicao(filter_input(INPUT_POST, "txtComposicao"));
    $medicamento->setIndicacao(filter_input(INPUT_POST, "txtPreparo"));
    $medicamento->setData(date("Y/m/d"));

    if (!$cod) {
        //Novo
        if ($receitaController->Cadastrar($medicamento)) {
            $resultado = "Medicamento cadastrado com sucesso";
        } else {
            $resultado = "Houve um erro ao tentar cadastrar a bula desse medicamento";
        }
    } else {
        //Editando
        $medicamento->setCod($cod);
        
        if ($receitaController->Alterar($medicamento)) {
            $resultado = "Medicamento alterado";
        } else {
            $resultado = "Houve um erro ao tentar alterar a bula desse medicamento";
        }
    }
}


if ($cod) {
    $itemMedicamento = $receitaController->RetornaMedicamento($cod);
    $titulo = $itemMedicamento->getTitulo();
    $composicao = $itemMedicamento->getComposicao();
    $indicacao = $itemMedicamento->getIndicacao();
    
}
?>

<div id="dvNovo">
    <h3> Cadastrar nova receita (BULA)</h3>

    <div class="row">
        <form method="post" name="frmGerenciarReceita">
            
            <?php
            
            foreach ($categoriaController->RetornaTudo() as $v) {
                ?>
                    <input name="group1" value="<?=$v->getCod()?>" type="radio" id="<?=$v->getCod()?>" />
                    <label for="<?=$v->getCod()?>"><?=$v->getNome()?></label>
                <?php
            }
            
            ?>
                    
            <div class="input-field col s12">
                <input id="txtTitulo" name="txtTitulo" type="text" class="validate" value="<?= $titulo; ?>"  />
                <label for="txtTitulo">Título</label>
            </div>

            <div class="input-field col s12">
                <textarea id="txtComposicao" name="txtComposicao" class="materialize-textarea"><?= $composicao; ?> </textarea>
                <label for="txtComposicao">Composição</label>
            </div>

            <div class="input-field col s12">
                <textarea id="txtPreparo" name="txtPreparo" class="materialize-textarea"><?= $indicacao; ?></textarea>
                <label for="txtPreparo">Indicação</label>
            </div>

            <div class="col s12">
                <span><?= $resultado; ?>&nbsp;</span>
            </div>

            <div class="col s12">
                <input type="submit" class="waves-effect yellow accent-3 btn" name="btnGravar" value="Gravar" />
                <a class="waves-effect red lighten-1 waves-light btn" href="?pagina=nova">Cancelar</a>
                <a href="?pagina=pesquisa" class="waves-effect blue accent-1 accent-3 btn">Voltar</a>
            </div>
        </form>
    </div>

</div>