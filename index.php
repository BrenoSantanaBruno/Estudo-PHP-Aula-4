<?php
include 'banco.php';
include 'Usuario.php';

// Obter conexão com o banco de dados
$database = new banco();
$db = $database->getConnection();

// Instanciar um novo objeto de usuário
$usuario = new Usuario($db);

// Definir os valores do usuário
$usuario->nome = "Breno Santana";
$usuario->email = "contato@devstorm.io";
$usuario->senha = password_hash("000000`", PASSWORD_BCRYPT);  // Hash da senha

// Criar usuário
if ($usuario->criarUsuario()) {
    echo "Usuário criado com sucesso!";
} else {
    echo "Erro ao criar usuário.";
}

