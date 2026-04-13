<?php
/**
 * Disciplina: Desenvolvimento Web II (DWII)
 * Aula : 06 - Autenticação com sessões e controle de acesso
 * Arquivo : 04_sessoes/perfil.php
 * Autor : Gabriel Borba de Oliveira
 */

require_once __DIR__ . '/includes/auth.php';
requer_login();

if (!isset($_SESSION['visitas'])) {
    $_SESSION['visitas'] = 0;
}
$_SESSION['visitas']++;

$titulo_pagina = 'Perfil';
$caminho_raiz = '../';
$pagina_atual = 'login';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container">

    <div class="card">
        <h3>Perfil</h3>
        <p><strong>Usuário:</strong>
            <?php echo htmlspecialchars($_SESSION['usuario']); ?>
        </p>
        <p><strong>Login realizado em:</strong>
            <?php echo htmlspecialchars($_SESSION['logado_em'] ?? '-'); ?>
        </p>
        <p><strong>Visitas realizadas:</strong>
            <?php echo htmlspecialchars($_SESSION['visitas']); ?>
        </p>
    </div>

    <p style="margin-top: 24px; text-align: center;">
        <a href="painel.php" style="background: #3b579d; color: white; padding: 10px 24px; border-radius: 6px; text-decoration: none;">← Voltar ao Painel</a>
    </p>

</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>