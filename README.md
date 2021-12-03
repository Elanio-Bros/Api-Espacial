Primeiro crie um arquivo .env [`exemplo do arquivo env`](https://github.com/Elanio-Bros/Crud-Laravel/blob/main/.env.example) os requisitos para mudança são:
1. DB_HOST
2. DB_PORT
3. DB_DATABASE
4. DB_USERNAME
5. DB_PASSWORD

&nbsp;
Esse requisitos são importantes pra a configuração do **Banco De Dados**

&nbsp;
Depois digite os commandos:
1. `composer install` para instalar as dependecias
2. `php artisan key:generate` para gerar uma chave.
3. `php artisan migrate --seed` para criar todas as migrações no banco de dados com os dados
4. `php artisan serve` para iniciar o servidor

&nbsp;
A pagina home do servidor tem a documentação básica

&nbsp;
## Lógica

&nbsp;
A Api ela tem como funcionalidade simples de adicionar Pessoas, fazer listagem de pessoas, apagar do banco de dados atualizar e modificar informações
