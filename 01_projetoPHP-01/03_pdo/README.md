# Catálogo de Tecnologias

Aplicação PHP que utiliza PDO e MariaDB para gerenciar um catálogo de tecnologias. Permite listar, filtrar por categoria, buscar por termo e visualizar detalhes.

## Estrutura da tabela

| Campo        | Tipo         | Descrição                         |
|--------------|--------------|-----------------------------------|
| id           | INT (PK)     | Identificador único               |
| nome         | VARCHAR(100) | Nome da tecnologia                |
| categoria    | VARCHAR(50)  | Categoria (Frontend, Backend, etc)|
| descricao    | TEXT         | Descrição detalhada               |
| ano_criacao  | INT          | Ano de criação                    |
| criado_em    | TIMESTAMP    | Data de inserção (automático)     |

## Como configurar o banco

1. Execute o script `sql/setup.sql` no seu MariaDB.
2. Ajuste as credenciais no arquivo `includes/conexao.php` (host, usuário, senha, banco).
3. Certifique-se de que o servidor PHP está rodando na raiz do projeto.

## Como executar

```bash
php -S localhost:8000