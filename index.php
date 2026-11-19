<?php
session_start();
require_once 'controllers/FuncionarioController.php';
$controller = new FuncionarioController();
$mensagem = $controller->processar();
$funcionarios = $controller->listar();
require_once 'views/home.php';
?>
