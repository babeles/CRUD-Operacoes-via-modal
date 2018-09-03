<?php
include './contatos.class.php';
$contatos = new Contatos();

if (!empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
    $info = $contatos->getInfo($id);
    
} else {
    header("Location: index.php");
}

?>
<h1>EDITAR</h1>
<form method="POST" action="editar-contatos.php">
    <input type="hidden" name="id" value="<?=$info['id']?>"/>
    Nome:</br>
    <input type="text" name="nome" value="<?=$info['nome']?>"/></br></br>
    E-mail:</br>
    <input type="email" name="email" value="<?=$info['email']?>"/></br></br>
    
    <input type="submit" value="SALVAR"/>
    <a href="index.php">[ CANCELAR ]</a>
</form>
