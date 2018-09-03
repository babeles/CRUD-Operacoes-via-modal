<?php
include './contatos.class.php';
$contatos = new Contatos();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
    
    $contatos->excluir($id);
    
}

header("Location: index.php");
