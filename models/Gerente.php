<?php
require_once 'models/Funcionario.php';
class Gerente extends Funcionario { public function calcularBonus() { return $this->getSalario() * 0.15; } }
?>
