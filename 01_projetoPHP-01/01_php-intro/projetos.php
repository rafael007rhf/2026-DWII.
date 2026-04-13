<?php
/**
 * ARQUIVO : 01_php-intro/projetos.php
 * Disciplina : desenvolvimento Web II (2026-DWII)
 * Aula : 03 - Arquitetura Web e Introdução ao PHP
 * Autor : Gabriel Borba de Oliveira
 */
$nome = "Gabriel Borba de Oliveira"; 
$pagina_atual = "projetos";
$caminho_raiz = "../";
$titulo_pagina = "Projetos - {$nome}";
include '../includes/nav.php'
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetos - <?php echo $nome; ?></title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>


    <div class="projetos">
        <h1>Projetos</h1>
        <h2>Jogo da Velha em Python</h2>
        <p>Projeto criado no 1º ano na matéria de lógica de programação.</p>

        <h2>Portfólio de Apresentação</h2>
        <p>Primeiro projeto criado em DWII usando HTML e CSS.</p>

        <h2>Site de Clima - Gostaria de fazer futuramente</h2>
        <p>Esse projeto pegaria os dados de uma API pública para exibir os dados do clima de determinada cidade.</p>
        <a href="index.php"> Voltar ao início</a>
    </div> 

    <?php include '../includes/rodape.php'; ?>

</body>
</html>