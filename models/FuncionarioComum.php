<?php
require_once 'models/Funcionario.php';
class FuncionarioComum extends Funcionario { public function calcularBonus() { return $this->getSalario() * 0.05; } }
?>
