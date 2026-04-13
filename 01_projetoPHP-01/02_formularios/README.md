# Formulário de Contato — Aula 04 DWII

Página de contato com validação no servidor, utilizando PHP puro e o padrão PRG (Post-Redirect-Get).
O formulário coleta nome, e-mail e mensagem, exibindo erros de forma amigável e redirecionando para uma página de agradecimento após o envio bem‑sucedido.

## Como executar

```
cd ~/workspaces/2026-DWII
php -S localhost:8001 -t 02_formularios/
```

Acesse: http://localhost:8001

## Campos do formulário

- Nome — texto, obrigatório
- E-mail — e-mail, obrigatório, formato válido
- Mensagem — texto longo, obrigatório, mínimo de 10 e máximo de 500 caracteres

## Validações implementadas

- Todos os campos são obrigatórios.
- E-mail validado com `FILTER_VALIDATE_EMAIL`.
- Mensagem com contagem de caracteres e limite de 500 caracteres.
- Exibição dos erros no próprio formulário, preservando os dados preenchidos.

## Estrutura de arquivos

- contato.php        — formulário e processamento
- obrigado.php       — página de confirmação (destino do PRG)
- includes/
  - cabecalho.php    — cabeçalho HTML compartilhado
  - rodape.php       — rodapé HTML compartilhado
  - nav.php          — menu dinâmico com destaque para a página atual
- README.md          — esta documentação