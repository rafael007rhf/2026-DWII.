<?php
/**
 * Disciplina: Desenvolvimento Web II (DWII)
 * Aula : 07 - CRUD: Create e Read
 * Arquivo : 05_crud/detalhe.php
 * Autor : Gabriel Borba de Oliveira
 * Data : 03/04/2026
 * Descrição : Exibe todos os campos de um projeto específico (Read individual)
 */

require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login();

require_once __DIR__ . '/includes/conexao.php';

// Valida o ID recebido pela URL (requisito B2)
$id = (int) ($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$pdo = conectar();
$stmt = $pdo->prepare('SELECT * FROM projetos WHERE id = :id');
$stmt->execute([':id' => $id]);
$projeto = $stmt->fetch();

if (!$projeto) {
    header('Location: index.php');
    exit;
}

$titulo_pagina = 'Detalhe do Projeto - ' . htmlspecialchars($projeto['nome']);
$caminho_raiz = '../';
$pagina_atual = '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>
<div class="container">
    <h1 class="titulo-secao">📄 <?php echo htmlspecialchars($projeto['nome']); ?></h1>

    <div class="card">
        <p><strong>Descrição:</strong><br>
        <?php echo htmlspecialchars($projeto['descricao']); ?></p>

        <p><strong>Tecnologias usadas:</strong><br>
        <?php echo htmlspecialchars($projeto['tecnologias']); ?></p>

        <p><strong>Ano:</strong> <?php echo htmlspecialchars($projeto['ano']); ?></p>

        <?php if (!empty($projeto['link_github'])): ?>
            <p><strong>Link do GitHub:</strong><br>
            <a href="<?php echo htmlspecialchars($projeto['link_github']); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo htmlspecialchars($projeto['link_github']); ?>
            </a></p>
        <?php endif; ?>

        <p><strong>Cadastrado em:</strong> <?php echo date('d/m/Y \à\s H:i:s', strtotime($projeto['criado_em'])); ?></p>
    </div>

    <p style="margin-top: 20px;">
        <a href="index.php" class="btn-secundario">← Voltar para a listagem</a>
    </p>
</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>