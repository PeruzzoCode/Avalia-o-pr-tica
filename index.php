<?php 


if($_SERVER["REQUEST_METHOD"])
    $_POST = ["nome"];
    $_POST = ["email"];
    $_POST = ["salario"];
    $_POST = ["tipo"];


// $xemplo = "edu";
// echo $exemplo;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    
<form method=POST>

    <label>Digite seu nome: </label>
    <input type="text" id="nome" name="nome"></input>

    <label>Digite seu e-mail: </label>
    <input type="text" id="email" name="email"></input>

    <label>Digite seu salario: </label>
    <input type="text" id="salario" name="salario"></input>

    <label>Digite seu cargo: </label>
    <input type="text" id="yipo" name="tipo"></input>

</form>

    <h2>Lista de Funcionários Cadastrados</h2>

</body>
</html>