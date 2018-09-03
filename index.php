<?php
include './contatos.class.php';
$contatos = new Contatos();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CRUD</title>
        <link rel="stylesheet" href="assets/css/estilo.css"/>
        <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="assets/js/script.js"></script>
    </head>
    <body>
        
<h1>Lista de Contatos</h1>
<a href="adicionar.php" class="modal_ajax">[ADICIONAR]</a><br><br>
<table border="1" width="900px">
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>E-mail</td>
        <td>Ações</td>
    </tr>
    <?php
    $contatosAll = $contatos->getAll();
    foreach ($contatosAll as $row) { ?>
    <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['nome']?></td>
        <td><?=$row['email']?></td>
        <td>
            <a href="editar.php?id=<?=$row['id']?>" class="modal_ajax">[Editar]</a>
            <a href="excluir.php?id=<?=$row['id']?>">[Excluir]</a>
        </td>
    </tr>   
    <?php } ?>
</table>

<div class="modal_bg">
    <div class="modal"> 
    </div>    
</div>




    </body>
</html>
