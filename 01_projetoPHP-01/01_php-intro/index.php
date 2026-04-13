<?php
/**
 * 
 * ARQUIVO : 01_php-intro/index.php
 * Disciplina : Desenvolvimento Web II (2026-DWII)
 * Aula : 03 - Arquitetura Web e Introdução ao PHP
 * Autor : Gabriel Borba de Oliveira
 * 
 */

// Variáveis PHP - serão usadas no HTML abaixo
$nome = "Gabriel Borba de Oliveira";
$profissao = "Técnico em Informática em formação";
$curso = "Técnico em Informática - IFPR";
$pagina_atual = "inicio";
$caminho_raiz = "../";
$titulo_pagina = "Portfólio - {$nome}";
include '../includes/nav.php'
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio - <?php echo $nome; ?></title>
    <link rel="stylesheet" href="../includes/style.css">
    </style>
</head>
<body>
    

    <div class="hero">
        <h1><?php echo $nome; ?></h1>
        <p><?php echo $profissao; ?> | <?php echo $curso; ?></p>
    </div>

    <div class="container">
        <h2>Bem-vindo ao meu portfólio</h2>
        <p>Esta página foi gerada pelo PHP em:
            <strong><?php echo date("d/m/Y \à\s H:i:s"); ?></strong></p>
    </div>

    <div class="msg">
        <h2>Sobre este site</h2>
        <p>Técnico em Informática em formação, provavelmente futuro aluno da UEPG em engenharia de software. E com diversos interesses em outras áreas.</p>
    </div>

    <div class=link>
        <h2>Explore mais</h2>
        <a href="sobre.php">→ Sobre mim</a> <a href="projetos.php">   → Meus Projetos</a>
    </div>

    <?php include '../includes/rodape.php'; ?>
</body>
</html>