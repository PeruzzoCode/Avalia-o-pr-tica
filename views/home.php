<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Funcionários</title>
<style></style></head><body><main>
<h1>Gerenciamento de funcionários</h1>
<?php if (!empty($_SESSION['operador'])): ?>
    <p>Bem-vindo,
         <?= htmlspecialchars($_SESSION['operador']) ?>
         !</p><form method="POST">
            <button name="sair" value="1">Encerrar sessão</button>
        </form>
        <?php else: ?>
            <form method="POST"><label>Nome do operador</label>
            <input name="operador" required><button>Entrar</button></form><?php endif; ?>
        <?php if ($mensagem): ?><p><?= htmlspecialchars($mensagem) ?></p><?php endif; ?>
            <section><h2>Cadastrar funcionário</h2>
            <form method="POST"><label>Nome</label><input name="nome" required><label>E-mail</label>
            <input type="email" name="email" required><label>Salário</label><input type="number" name="salario" step="0.01" min="0" required>
            <label>Tipo</label><select name="tipo"><option>FuncionarioComum</option>
            <option>Gerente</option></select><button type="submit">Cadastrar</button></form>
        </section>
        <section><h2>Funcionários cadastrados</h2>
        <?php if (isset($_GET['excluir'])): ?><p>Confirma excluir o funcionário #<?= (int)$_GET['excluir'] ?>?
        </p><form method="POST"><input type="hidden" name="excluir_id" value="<?= (int)$_GET['excluir'] ?>"><button>Confirmar exclusão</button></form><a href="index.php">Cancelar</a><?php endif; ?>
        <?php foreach ($funcionarios as $item): $classe = $item['tipo'] === 'Gerente' ? new Gerente($item['nome'],$item['email'],$item['salario']) : new FuncionarioComum($item['nome'],$item['email'],$item['salario']); ?>
        <div class="funcionario"><strong><?= htmlspecialchars($item['nome']) ?></strong> — <?= htmlspecialchars($item['tipo']) ?><br>Salário: R$ <?= number_format((float)$item['salario'],2,',','.') ?> 
        | Bônus: R$ <?= number_format($classe->calcularBonus(),2,',','.') ?><br>
        <a href="?excluir=<?= (int)$item['id'] ?>">Excluir</a></div><?php endforeach; ?>
        <?php if (!$funcionarios): ?><p>Nenhum funcionário listado (ou banco desconectado).</p><?php endif; ?></section></main></body></html>

