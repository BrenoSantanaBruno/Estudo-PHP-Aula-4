<?php

class Usuario
{
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $data_criacao;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function criarUsuario() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, email=:email, senha=:senha";

        $stmt = $this->conn->prepare($query);

        // Limpar os dados de entrada
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->senha = htmlspecialchars(strip_tags($this->senha));

        // Bind dos parâmetros
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);

        // Tenta executar a query
        if ($stmt->execute()) {
            return true;
        }

        // Se houver erro, exibe a mensagem de erro
        printf("Erro: %s.\n", $stmt->errorInfo()[2]);
        return false;
    }
}
