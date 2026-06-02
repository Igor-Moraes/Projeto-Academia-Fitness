<?php
// Início do arquivo de segurança para o processamento do cadastro.
// Este arquivo deve ser incluído antes de executar qualquer lógica de salvamento.

// Verifica se a requisição foi enviada usando o método POST.
// O formulário de cadastro envia os dados via POST, então qualquer outro método indica acesso direto indevido.
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST)) {
    // Se não for POST ou se não houver dados, redireciona o usuário de volta para o formulário de cadastro.
    header('Location: cadastro.php');
    exit;
}

// Lista de campos obrigatórios que devem estar presentes no POST.
$requiredFields = [
    'nome',
    'email',
    'telefone',
    'modalidade',
    'cpf',
    'data_nascimento',
    'senha',
    'confirmar_senha'
];

// Para cada campo obrigatório, verifica se ele existe e não está vazio.
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
        // Se algum campo obrigatório estiver faltando ou vazio, redireciona de volta para o formulário.
        header('Location: cadastro.php');
        exit;
    }
}

// Se chegar até aqui, a requisição é POST e todos os campos obrigatórios estão preenchidos.
?>