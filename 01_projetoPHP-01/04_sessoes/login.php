<?php
/**
 * Disciplina: Desenvolvimento Web II (DWII)
 * Aula : 06 - Autenticação com sessões e controle de acesso
 * Arquivo : 04_sessoes/login.php
 * Autor : Gabriel Borba de Oliveira
 * Data : 23/03/2026
 */

session_start();

require_once __DIR__ . '/includes/auth.php';
redirecionar_se_logado(); // se já estiver logado, vai para painel.php


$USUARIO_VALIDO = 'admin';
$SENHA_VALIDA = 'dwii2026';

$erro = '';
$login = '';

$ip = $_SERVER['REMOTE_ADDR'];
if (!isset($_SESSION['tentativas'][$ip])) {
    $_SESSION['tentativas'][$ip] = 0;
}
if (!isset($_SESSION['bloqueado_ate'][$ip])) {
    $_SESSION['bloqueado_ate'][$ip] = 0;
}

$bloqueado = $_SESSION['bloqueado_ate'][$ip] > time();

if ($bloqueado) {
    $segundos_restantes = $_SESSION['bloqueado_ate'][$ip] - time();
    $erro = "Muitas tentativas. Tente novamente em $segundos_restantes segundos.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$bloqueado) {
    $login = trim($_POST['usuario'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    if ($login === $USUARIO_VALIDO && $senha === $SENHA_VALIDA) {
        $_SESSION['tentativas'][$ip] = 0;
        $_SESSION['bloqueado_ate'][$ip] = 0;
        session_regenerate_id(true);
        $_SESSION['usuario'] = $login;
        $_SESSION['logado_em'] = date('d/m/Y \à\s H:i');
        $_SESSION['flash'] = "Bem-vindo, $login!";
        header('Location: painel.php');
        exit;
    } else {
        $_SESSION['tentativas'][$ip]++;
        if ($_SESSION['tentativas'][$ip] >= 3) {
            $_SESSION['bloqueado_ate'][$ip] = time() + 60;
        }
        $erro = 'Usuário ou senha incorretos.';
    }
}

$titulo_pagina = 'Login - Área restrita';
$caminho_raiz = '../';
$pagina_atual = 'login';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>
    
<div class="container" style="max-width: 420px;">
    <div class="form-container">
        <h1 class="titulo-secao" style="text-align: center; font-size: 22px;">
            🔒 Área restrita
        </h1>

        <?php if ($erro): ?>
            <div class="alerta-erro">
                <p style="margin: 0; font-size: 14px;">
                    🚫 <?php echo htmlspecialchars($erro); ?>
                </p>
            </div>

        <?php endif; ?>

        <form action="login.php" method="post">
            <label>Usuário:</label>
            <input type="text" name="usuario" value="<?php echo htmlspecialchars($login); ?>" autocomplete="username">

            <label>Senha:</label>
            <input type="password" name="senha" autocomplete="current-password">

            <button type="submit">Entrar</button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 13px; color: #6b7280;">
            <a href="../index.php" style="color: #3b579d;">↼ Voltar ao início</a>
        </p>

    </div>
</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>

</body>
</html>