<?php
include './contatos.class.php';
$contatos = new Contatos();

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = addslashes($_POST['id']);
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    
    $contatos->editar($id, $nome, $email);
    
    header("Location: index.php");
}
