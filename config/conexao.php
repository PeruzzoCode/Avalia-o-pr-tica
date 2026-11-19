<?php
// Conexão propositalmente errada: ajuste host, banco, usuário e senha.
try { $pdo = new PDO('mysql:host=servidor_errado;dbname=banco_errado', 'usuario_errado', 'senha_errada'); }
catch (PDOException $e) { $pdo = null; }
?>
