<?php

class banco
{
    private $host = "127.0.0.1"; // Se estiver rodando localmente, altere conforme necessário.
    private $db_name = "meu_banco";
    private $username = "root";
    private $password = "senha_root";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Erro de conexão: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
