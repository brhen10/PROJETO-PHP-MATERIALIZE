<?php
require_once ("login.php");

if (!Login::getInstance()->isAutenticado()) {
    header("Location: world-autenticacao.php");
    die();
}

$login = Login::getInstance();

if ($login->autenticar('breno', '12345')) {
    echo "autenticado com sucesso";
    header("Location:..\index_1.php");
} else {
    echo "login / senha invalidos";
}
/*

  if(isset($_REQUEST['login'])) {

  if ($login->inserir('breno', '12345')) {
  echo "inseriu com sucesso";
  } else {
  echo "erro na inserção";
  }
  }

 */
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Projeto Final de Programação Web I</title>

    </head>
    <body>
                            <form method="POST" action="">
                                <label for="login">Login</label>
                                <input type="text" name="login" value="" id="login">

                                <label for="senha">Senha</label>
                                <input type="password" name="senha" value="" id="senha">

                                <input type="submit" name="salvar">
                            </form>
    
    </body>

</html>
