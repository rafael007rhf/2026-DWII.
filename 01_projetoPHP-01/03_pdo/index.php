<!--
Disciplina : Desenvolvimento Web II (DWII)
Aula : 05 - PHP + MariaDB: persistência de dados via PDO
Autor : Gabriel Borba de Oliveira
Data : 16/03/2026
-->
<?php
$titulo_pagina = "Catálogo de Tecnologias";
$pagina_atual = "catalogo";

require_once 'includes/conexao.php';


$categoria = trim($_GET['categoria'] ?? '');
$busca = trim($_GET['busca'] ?? '');

$sql = 'SELECT * FROM tecnologias';
$params = [];

if ($categoria && $busca) {
    $sql .= ' WHERE categoria = :cat AND (nome LIKE :termo1 OR descricao LIKE :termo2)';
    $params = ['cat' => $categoria, 'termo1' => "%$busca%", 'termo2' => "%$busca%"];
} elseif ($categoria) {
    $sql .= ' WHERE categoria = :cat';
    $params = ['cat' => $categoria];
} elseif ($busca) {
    $sql .= ' WHERE nome LIKE :termo1 OR descricao LIKE :termo2';
    $params = ['termo1' => "%$busca%", 'termo2' => "%$busca%"];
}

$sql .= ' ORDER BY nome ASC';

$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$tecnologias = $stmt->fetchAll();

$stmtCat = $pdo->query('SELECT DISTINCT categoria FROM tecnologias ORDER BY categoria');
$categorias = $stmtCat->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include 'includes/cab_pdo.php'; ?>
</head>
<body>
    <div class="container">
        <h1 class="titulo-secao">🗄️ Catálogo de Tecnologias</h1>

        <p style="color: #6b7280; margin-bottom: 20px;">
            <?php echo count($tecnologias); ?> tecnologia(s) cadastrada(s)
            <?php if ($categoria): ?>
                na categoria <strong><?php echo htmlspecialchars($categoria); ?></strong>
            <?php endif; ?>
            <?php if ($busca): ?>
                contendo <strong>"<?php echo htmlspecialchars($busca); ?>"</strong>
            <?php endif; ?>
        </p>

        <div style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
            <a href="index.php<?php echo $busca ? '?busca=' . urlencode($busca) : ''; ?>" 
               style="text-decoration: none; background: #e5e7eb; padding: 4px 12px; border-radius: 16px;">
                Todas
            </a>
            <?php foreach ($categorias as $cat): ?>
                <a href="index.php?categoria=<?php echo urlencode($cat['categoria']); ?><?php echo $busca ? '&busca=' . urlencode($busca) : ''; ?>"
                   style="text-decoration: none; background: #e5e7eb; padding: 4px 12px; border-radius: 16px;">
                    <?php echo htmlspecialchars($cat['categoria']); ?>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- Campo de busca -->
        <form method="get" action="index.php" style="margin-bottom: 20px;">
            <input type="text" name="busca" value="<?php echo htmlspecialchars($busca); ?>" placeholder="Pesquisar por nome ou descrição..." style="padding: 8px; width: 250px; border-radius: 4px; border: 1px solid #ccc;">
            <button type="submit" style="padding: 8px 16px;">Buscar</button>
        </form>


        <?php foreach ($tecnologias as $tec): ?>
            <div class="card">
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <h3><?php echo htmlspecialchars($tec['nome']); ?></h3>
                    <span style="background: #e8edf5; color: #3b579d; padding: 3px 10px; border-radius: 20px; font-size: 13px;">
                        <?php echo htmlspecialchars($tec['categoria']); ?>
                    </span>
                </div>
                <p><?php echo htmlspecialchars($tec['descricao']); ?></p>

                 <a href="detalhe.php?id=<?php echo $tec['id']; ?>
                    <?php if ($categoria) echo '&categoria=' . urlencode($categoria); ?>
                    <?php if ($busca) echo '&busca=' . urlencode($busca); ?>"
                   style="color: #3b579d; font-size: 14px; font-weight: bold; display: inline-block; margin-top: 10px;">
                    Ver detalhes ->
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php include 'includes/rod_pdo.php'; ?>
</body>
</html>
