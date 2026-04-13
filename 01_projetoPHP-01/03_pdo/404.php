<?php

/*

 ARQUIVO : 03_pdo/404.php
 Disciplina : Desenvolvimento Web II (2026-DWII)
 Aula : 05 - PHP + MariaDB: persistência de dados via PDO
 Autor : Gabriel Borba de Oliveira
 Conceitos : catálogo com PDO e MariaDB, htmlspecialchars()

*/

$titulo_pagina = "Página não encontrada";
$pagina_atual = "";
$caminho_raiz = '../';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php'; ?>
</head>
<body>
    <div class="container" style="text-align: center; margin-top: 80px;">
        <h1 style="color: #cf1c21;">404 - Tecnologia não encontrada</h1>
        <p style="font-size: 1.2rem;">O item que você procura não existe no catálogo.</p>
        <a href="index.php" class="btn" style="background: #3b579d; display: inline-block; margin-top: 20px;">Voltar ao catálogo</a>
    </div>
    <?php include 'includes/rod_pdo.php'; ?>
</body>
</html>