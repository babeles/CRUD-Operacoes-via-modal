<?php

class Contatos {
    
    private $pdo;
    
    public function __construct() {
        $this->pdo = new PDO("mysql:dbname=crud;host=localhost", "root", "");
    }
    
    public function adicionar($email, $nome = '') {
        // 1 Passo = Verificar se o email ja existi no sistema
        // 2 Passo = Adicionar
        
        if ($this->existeEmail($email) == false) {
            $sql = $this->pdo->prepare("INSERT INTO contatos (nome, email) VALUES (:nome, :email)");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->execute();
            
            return true;
        } else {
            return false;
        } 
    }
    
    public function getInfo($id) {
        $sql = $this->pdo->prepare("SELECT * FROM contatos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {         
            return $sql->fetch();;
        } else {
            return array();
        }
    }
    
    public function getAll() {
        $sql = $this->pdo->query("SELECT * FROM contatos");
        
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        } 
    }
    
    public function editar($id, $nome, $email) {
        $sql = $this->pdo->prepare("UPDATE contatos SET nome = :nome, email = :email WHERE id = :id");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
    public function excluir($id) {
        $sql = $this->pdo->prepare("DELETE FROM contatos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    
    private function existeEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM contatos WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {       
            return true;
        } else {
            return false;
        }
    }
    
}

