<?php
include './contatos.class.php';
$contatos = new Contatos();

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    
    $contatos->adicionar($email, $nome);

}

header("Location: index.php");
