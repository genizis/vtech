# Instalação do VTech em outro ambiente

Este pacote contém o sistema, as dependências PHP instaladas, os arquivos enviados em `clientes/` e o dump completo `vtech_completo.sql`.

## Requisitos

- Apache com `mod_rewrite` (recomendado) ou outro servidor web configurado para direcionar as rotas ao `index.php`
- PHP 7.4 ou compatível, com as extensões `mysqli`, `mbstring`, `xml`, `zip`, `gd`, `curl` e `intl`
- MySQL/Percona 5.7 ou versão compatível

## Instalação

1. Extraia o ZIP na pasta pública do servidor.
2. Crie um banco e importe o dump. O dump incluído recria o banco chamado `vtech`:

   ```bash
   mysql -u root -p < vtech_completo.sql
   ```

3. Configure o servidor web para usar esta pasta como raiz e permitir as regras do arquivo `.htaccess`.
4. Dê permissão de escrita ao usuário do servidor web nas pastas:

   ```bash
   chmod -R ug+rw application/cache application/logs clientes
   ```

5. Configure as variáveis de ambiente abaixo no Apache, PHP-FPM, painel da hospedagem ou container:

   ```text
   APP_BASE_URL=https://seu-dominio.com/
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_USERNAME=usuario_do_banco
   DB_PASSWORD=senha_do_banco
   DB_DATABASE=vtech
   ```

Sem essas variáveis, o sistema usa automaticamente a URL acessada e tenta conectar em `127.0.0.1:3306`, usuário `root`, sem senha, banco `vtech`.

## Desenvolvimento local

O arquivo `compose.yaml` inicia o Percona/MySQL local. Depois de subir o banco, importe o dump:

```bash
docker compose up -d
docker exec -i vtech-percona mysql -uroot < vtech_completo.sql
php -S 0.0.0.0:8080 router.php
```

Abra `http://localhost:8080`.

## Observações

- A pasta `vendor/` já está incluída. Se precisar reinstalar dependências, execute `composer install --no-dev --optimize-autoloader`.
- Logs, cache, metadados do Git, dependências de build do frontend e backups SQL antigos não fazem parte do pacote.
- Após validar a instalação, remova o arquivo `vtech_completo.sql` do servidor público ou mova-o para um local não acessível pela web.
