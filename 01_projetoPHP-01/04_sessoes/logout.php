<?php
/**
 * Disciplina: Desenvolvimento Web II (DWII)
 * Aula : 06 - Autenticação com sessões e controle de acesso
 * Arquivo : 04_sessoes/logout.php
 * Autor : Gabriel Borba de Oliveira
 * Data : 23/03/2026
 */

session_start();


session_unset();


session_destroy();


header('Location: login.php');
exit;
?>