<?php
require_once 'config/conexao.php';
require_once 'models/FuncionarioComum.php';
require_once 'models/Gerente.php';
class FuncionarioController
{
    public function processar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['operador'])) { $_SESSION['operador'] = trim($_POST['operador']); return 'Operador registrado.'; }
            if (isset($_POST['sair'])) { unset($_SESSION['operador']); return 'Sessão encerrada.'; }
            if (isset($_POST['excluir_id'])) {
                if (!$GLOBALS['pdo']) return 'Erro: conexão com o banco indisponível.';
                $st = $GLOBALS['pdo']->prepare('DELETE FROM funcionarios WHERE id = ?'); $st->execute([(int)$_POST['excluir_id']]); return 'Funcionário excluído.';
            }
            if (!isset($_POST['nome'], $_POST['email'], $_POST['salario'], $_POST['tipo']) || trim($_POST['nome']) === '' || trim($_POST['email']) === '' || trim($_POST['salario']) === '') return 'Preencha todos os campos.';
            if (!$GLOBALS['pdo']) return 'Erro: conexão com o banco indisponível.';
            $tipo = $_POST['tipo'] === 'Gerente' ? 'Gerente' : 'FuncionarioComum';
            $f = $tipo === 'Gerente' ? new Gerente($_POST['nome'], $_POST['email'], $_POST['salario']) : new FuncionarioComum($_POST['nome'], $_POST['email'], $_POST['salario']);
            $st = $GLOBALS['pdo']->prepare('INSERT INTO funcionarios (nome,email,salario,tipo) VALUES (?,?,?,?)');
            $st->execute([$f->getNome(), $f->getEmail(), $f->getSalario(), $tipo]); return 'Funcionário cadastrado.';
        }
        if (isset($_GET['excluir'])) return 'Confirme a exclusão abaixo.';
        return '';
    }
    public function listar() { return $GLOBALS['pdo'] ? $GLOBALS['pdo']->query('SELECT * FROM funcionarios ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC) : []; }
}
?>
