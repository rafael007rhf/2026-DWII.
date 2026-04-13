<?php
/**
 * 
 * ARQUIVO : 01_php-intro/sobre.php
 * Disciplina: Desenvolvimento Web II (2026-DWII)
 * Aula : 03 - Arquitetura Web e Introdução ao PHP
 * Autor : Gabriel Borba de Oliveira
 * 
 */

$nome = "Gabriel Borba de Oliveira";
$pagina_atual = "sobre";
$caminho_raiz = "../";
$titulo_pagina = "Sobre - {$nome}"
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre - <?php echo $nome; ?></title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>

    <?php include '../includes/nav.php'; ?>


    <div>
        <h1>👤 Sobre mim</h1>
        <p>Sou aluno do Instituto Federal do Paraná (IFPR) em Ponta Grossa, estou cursando T.I e estou atualmente no 3º ano. Escolhi fazer esse curso de TI e até agora estou gostando, após sair do IF pretendo permancer nessa área de tecnologia e cursar engenharia de softaware na UEPG, entretanto também tenho curisiodades em carreiras diversas, ainda não consegui decidir realmente o que quero.</p>
        <p>Falando mais a respeito do meu interesse em outras áreas, quando eu tinha 13 anos achava a área de medicina muito interessante, além do fato que eu era bem incentivado pelo meu pai que é enfermeiro. Após um tempo passei a ter interesse em concursos públicos por conta da vida tranquilha e estável que eles prometem, algo que me permitiria ter muita liberdade, ainda mais se fosse um concurso de nível federal. Porém eu sei o quanto de estudo e dedicaçãoque isso demanda e estou disposto a trilhar esse caminho, por mais que ainda não saiba direito a área.</p>
        <p>Nos concursos tenho grande apreço as áreas policiais devido ao fato de ser um trabalho foda e ter um grande número de vagas por concurso sendo de certa forma mais "fáceis", também admiro os concursos para perito criminal devido ao fato de ser uma área extensa, envolvendo atuações em cenas de crimes, laborátorios, informática forense, balística forense e as mais diversas áreas que ajudem a solucionar um crime. Todas as ideias me fazem sempre repensar o que quero fazer pelo resto da vida.</p>
        <a href="index.php"> Voltar ao início</a>
    </div> 

    <?php include '../includes/rodape.php'; ?>

</body>
</html>